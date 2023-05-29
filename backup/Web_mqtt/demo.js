function startConnect(){

    clientID = "clientID - "+parseInt(Math.random() * 100);

    host = document.getElementById("host").value;   
    port = document.getElementById("port").value;  
    userId  = document.getElementById("username").value;  
    passwordId = document.getElementById("password").value;  

    document.getElementById("messages").innerHTML += "<span> Connecting to "+host+" on port " +port+"</span><br>";
    document.getElementById("messages").innerHTML += "<span> Using the client Id " + clientID +" </span><br>";

    client = new Paho.MQTT.Client(host,Number(port),clientID);

    client.onConnectionLost = onConnectionLost;
    client.onMessageArrived = onMessageArrived;

    client.connect({
        onSuccess: onConnect
//      userName: userId,
//      passwordId: passwordId
    });


}


function onConnect(){
    topic =  document.getElementById("topic_s").value;

    document.getElementById("messages").innerHTML += "<span> Subscribing to topic "+topic+"</span><br>";

    client.subscribe(topic);
}



function onConnectionLost(responseObject){
    document.getElementById("messages").innerHTML += "<span> ERROR: Connection is lost.</span><br>";
    if(responseObject !=0){
        document.getElementById("messages").innerHTML += "<span> ERROR:"+responseObject.errorMessage+"</span><br>";
    }
}

function onMessageArrived(message){
    //document.getElementById("messages").innerHTML += "<span> 1st LAT: "+ message["latitud"] + "</span><br>";
    var message_str=message.payloadString;
    console.log("OnMessageArrived: "+ message_str);
    document.getElementById("messages").innerHTML += "<span> Topic:"+message.destinationName+"| Message : "+message_str + "</span><br>";
    document.getElementById("messages").innerHTML += "<span> 2nd Variable type: "+ typeof message_str + "</span><br>";
    
    var message_obj=JSON.parse(message_str);
    //document.getElementById("messages").innerHTML += "<span> LAT: "+ message_obj.latitud + "</span><br>";
    console.log("OnMessageArrived__: "+ message_obj['latitud'] );
    
}

function startDisconnect(){
    client.disconnect();
    document.getElementById("messages").innerHTML += "<span> Disconnected. </span><br>";
}

function publishMessage(){
    msg = document.getElementById("Message").value;
    topic = document.getElementById("topic_p").value;

    Message = new Paho.MQTT.Message(msg);
    Message.destinationName = topic;

    client.send(Message);
    document.getElementById("messages").innerHTML += "<span> Message to topic "+topic+" is sent </span><br>";
}
