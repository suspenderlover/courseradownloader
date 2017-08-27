$("#downloadVideosButton").on("click",downloadVideos);

function downloadVideos()
{
	if (linkValidation() == true)
	{
		// proceed
		if (isUserSignedIn() == true)
		{
			var cOAuth = getOauthLink();
			alert(cOAuth.finalURL)
		}
		else 
		{

		}
	}
	else
	{
		// 
	}		
}
function linkValidation()
{
	if ($("#downloadVideosText").val() == "")
	{
		alert("please enter a link to your coursera videos page");
		return false;
	}
	else
		// if check if it's actually a link to the videos page
		return true;
}
function isUserSignedIn()
{
	// if user's signed in 
		return true;
	// else reutn false
}
function getOauthLink() 
{
	var cOAuth = new Object(); // cOAuth: short for courseraOAuth
	cOAuth.url = getOAuthURL();
	cOAuth.responseType = getResponseType();
	cOAuth.clientSecretKey = getClientSecretKey();
	cOAuth.clientID = getClientID();
	cOAuth.redirectUri = getRedirectURI();
	cOAuth.scope = getScope();
	cOAuth.finalURL = cOAuth.url + "?" + "response_type=" + cOAuth.responseType + "&" + "client_secret=" + cOAuth.clientSecret + 
	"&" + "client_id=" + cOAuth.clientID + "&" + "redirect_uri=" + cOAuth.redirectUri + "&" + "scope=" + cOAuth.scope;
	return cOAuth;
}
function getScope()
{
	return "view_profile";
}
function getOAuthURL()
{
	return "https://accounts.coursera.org/oauth2/v1/auth";
}
function getResponseType()
{
	return "code";
}
function getClientSecretKey()
{
	return "9LU8xy7PZSDZp9hfOW5pNg";
}
function getClientID()
{
	return "Zhx55cQbZ4rjqmYwRpjSAw";
}
function getRedirectURI()
{
	return "http://localhost/courseraGreyscale/index.html";
}

