<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$text = trim($text);
$text = strtolower($text);

$stickers = array("CAADBAADAQcAApEMbAtICGAYZ93cWAI", "CAADAgADHAADyIsGAAFzjQavel2uswI", "CAADBAADKwADfXowBxSsyRbvJAthAg");

header("Content-Type: application/json");
switch($text)
	{	
		case "/sticker":
			
		break;
		
		case "/infomsg":
			$parameters = array('chat_id' => $chatId, "text" => $update);
			$parameters["method"] = "sendMessage";
		break;
		
		default:
			//if (date("h:i") == "23:00")
			if ("ciao" == "ciao")
			{	
				//$parameters = array('chat_id' => $chatId, "text" => "Momento ASMR");
				$parameters = array('chat_id' => $chatId, "sticker" => "CAADBAADAQcAApEMbAtICGAYZ93cWAI");
				//AAQEABNROL8aAAQ1COQppSMeVcEeAAIC
				$parameters["method"] = "sendSticker";
			}
			else
			{
				$parameters = array('chat_id' => $chatId, "text" => "Nulla");
			}
			$parameters["method"] = "sendMessage";
	}
	
	echo json_encode($parameters);
	
?>