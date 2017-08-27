<?php

class CourseraController extends Controller {

    public function actionIndex() {
        if(isset($_REQUEST['checkbox'])){
            
           $videosarray= $_REQUEST['checkbox'];
            $this->getVideotoDownload($videosarray);
            $this->render('index',array('status'=>'progress'));
        }

        $this->render('index');
    }

    public function actionRequestURL() {
        unset( Yii::app()->session['requestuser']);
        
        $headings[] = array();
        $i = 0;
        if (isset($_REQUEST['request_url'])) {
            $i++;
            $request_url = $_REQUEST['request_url'];
           $url_split= parse_url($request_url);
            
            $url_split_path = explode('/', $url_split['path']);
//            var_dump($url_split_path[2]);die('dddd');
//            end($url_split);
//            $last_element = key($url_split);
            if(isset($url_split_path[2])){
            $api_url = 'https://www.coursera.org/api/opencourse.v1/course/' . $url_split_path[2];
            $output = Yii::app()->curl->get($api_url);
            }else{
                echo 'Not Found';
                return;
            }
            
            
            $json = json_decode($output, true);
            
//            echo '<pre>';
//            print_r($json['name']);die();
            if(!isset($json['courseMaterial']['elements'])){
                
                echo 'Not Found';
                
                return;
            }
            array_push($headings, $json['name']);
            
            Yii::app()->session['requestuser']=$json['name'];
            $json_modules = $json['courseMaterial']['elements'];
           
            foreach ($json_modules as $module) {

                $module_slug = $module['slug'];
                $headings[] = $module_slug;
                $sections = [];
                $json_sections = $module['elements'];
                foreach ($json_sections as $section) {
                    $section_slug = $section['slug'];
                    $lectures = [];
                    $json_lectures = $section['elements'];
                    foreach ($json_lectures as $lecture) {
                        $lecture_slug = $lecture['slug'];

                        if ($lecture['content']['typeName'] == 'lecture') {
                            if (isset($lecture['content']['definition']['videoId'])) {
                                $lecture_video_id = $lecture['content']['definition']['videoId'];
                                $lecture_name = $lecture['name'];
                                $videoDetails = array('name' => $lecture_name, 'videoid' => $lecture_video_id);
                                array_push($headings, $videoDetails);
//                                $headings[]['videotitle'] = $lecture_name;
//                                $headings[]['videoid'] = $lecture_video_id;
                            }



//                             echo'<pre>';
//                             print_r($lecture_video_id);
                        }
//                    video_content = get_on_demand_video_url(session,
//                                                            lecture_video_id,
//                                                            subtitle_language,
//                
                    }
                }
            }
            
            echo json_encode(array_filter($headings));
            




//            die('here lkdjaflkaj');
//            // Get cURL resource
//            $curl = curl_init();
//            // Set some options - we are passing in a useragent too here
//            curl_setopt_array($curl, array(
//                CURLOPT_RETURNTRANSFER => 100,
//                CURLOPT_URL => 'https://www.coursera.org/api/opencourse.v1/course/' . $url_split[$last_element]
//            ));
//            var_dump($curl);
//            // Send the request & save response to $resp
//            $resp = curl_exec($curl);
//            if (!curl_exec($curl)) {
//                die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
//            }
//            // Close request to clear up some resources
//            curl_close($curl);
//
//            var_dump($resp);
//            die();
        }
    }

    function generateRandomString($length = 10) {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    }

    public function getVideotoDownload($videosarray) {
        ini_set('memory_limit', '-1');
        ini_set('max_execution_time', 7000);
        $videoURLs = array();
        if (isset($videosarray)) {
            
            $data_info = $videosarray;
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_NOBODY, false);
            curl_setopt($ch, CURLOPT_COOKIEJAR, Yii::app()->basePath.'\cookies.txt');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_URL, "https://www.coursera.org/api/login/v3");
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('email' => 'couresera12345@gmail.com',
                'password' => 'couresera123',
                'webrequest' => 'true')));
            # csrftoken is simply a 20 char random string.
            $csrftoken = $this->generateRandomString(20);
            $csrf2cookie = 'csrf2_token_' . $this->generateRandomString(8);
            $csrf2token = $this->generateRandomString(24);
            $cookie = "csrftoken=" . $csrftoken . "; " . $csrf2cookie . "=" . $csrf2token;
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "Cookie: $cookie",
                "X-CSRFToken: $csrftoken",
                "X-CSRF2-Cookie: $csrf2cookie",
                "X-CSRF2-Token: $csrf2token",
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            
            for ($i = 0; $i < count($data_info); $i++) {
                $split_video_name_id = explode(':', $data_info[$i]);
                
                
                $url = 'https://www.coursera.org/api/opencourse.v1/video/' . $split_video_name_id[1];

                preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $server_output, $matches);
                $cookies = array();
                foreach ($matches[1] as $item) {
                    parse_str($item, $cookie);
                    $cookies = array_merge($cookies, $cookie);
                }

                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 0);
                $server_output = curl_exec($ch);
               
                $json = json_decode($server_output, true);
                                
                if(isset($json['sources'][0]['formatSources']['video/mp4'])){
                    
                    $urlwithfilename=array('url'=>$json['sources'][0]['formatSources']['video/mp4'],'name'=>$split_video_name_id[0]);
                    array_push($videoURLs,$urlwithfilename);
                }
              
            }
//            var_dump($videoURLs);
            
//           $this->render('ziparchive',array('files'=>$videoURLs));
            $this->ZipArchiving($videoURLs);
              
        }
        
    }
    
    function ZipArchiving($files) {
        $zip = new ZipArchive();
        $tmp_file = tempnam('.', '');
        $zip->open($tmp_file, ZipArchive::CREATE);

        foreach ($files as $file) {
           
            # download file
//            echo'<pre>';
//            print_r($file['url']);
            $download_file = file_get_contents($file['url']);
            
     
            $zip->addFromString($file['name'], $download_file);
        }
        $zip->close();
//        header('Content-type: video/mpeg')
        header('Content-Description: File Transfer');
        header('Content-type: video/mp4');
        if(isset(Yii::app()->session['requestuser'])){
            $title=Yii::app()->session['requestuser'];
        }else{
            $title='download';
        }
        header('Content-disposition: attachment; filename='.$title.'.zip');
//        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header('Content-type: application/force-download');
//        header("Content-Type: application/epub+zip");
        header("Content-Length: ".filesize($tmp_file));
//        $this->actionIndex();
        readfile($tmp_file);
//        $this->actionIndex();
    }

}
