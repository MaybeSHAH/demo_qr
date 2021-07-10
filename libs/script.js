var hostName = "localhost";
var port = 8083;
var userName = "";
var userPass = "";
var mqttID = "web_" + parseInt(Math.random() * 100, 10);

var dataObj = {};
client = new Paho.MQTT.Client(hostName, port, mqttID);

client.onConnectionLost = function (responseObject) {
    alert("connection lost: " + responseObject.errorMessage);
};

client.onMessageArrived = function (message) {
    //console.log("Message Got : " + message.payloadString);
    
    console.log('Message Arrived');
   





};



var options = {
    useSSL: false,
    userName: userName,
    password: userPass,
    onSuccess: onConnect,
    onFailure: doFail
}

client.connect(options);

function onConnect() {
    console.log("MQTT Connected ! ");
    client.subscribe("weight");
    client.subscribe("quantity");
    console.log("MQTT Subscribed ! ");

}

function doFail(e) {
    console.log("Failed : " + e);
}





function printBit(){
    var filename = document.getElementById("filename").value
    console.log('print published')
    client.publish('print', filename);
}
/*
import sys
from _datetime import datetime


def _linux_set_time(time_tuple):
    import subprocess
    import shlex

    time_string = datetime(*time_tuple).isoformat()

    subprocess.call(shlex.split("timedatectl set-ntp false"))  # May be necessary
    subprocess.call(shlex.split("date -s '%s'" % time_string))
    #subprocess.call(shlex.split("sudo hwclock -w"))
time_tuple = (2021,  # Year
              1,  # Month
              29,  # Day
              13,  # Hour
              1,  # Minute
              0,  # Second
              0,  # Millisecond
              )
    #sub_data('lang')
    #if sys.platform=='linux2':
    _linux_set_time(time_tuple)
*/