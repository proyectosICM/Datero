const mqttClient = new Paho.MQTT.Client(&quot;hostname&quot;, port, &quot;clientId&quot;);
mqttClient.connect({ onSuccess: onConnect });

function onConnect() {
console.log(&quot;Conexión exitosa&quot;);
mqttClient.subscribe(&quot;topic&quot;);
}

mqttClient.onMessageArrived = onMessageArrived;

function onMessageArrived(message) {
const data = JSON.parse(message.payloadString);
updateTable(data);
}

function updateTable(data) { //n
    const table = document.getElementById(&quot;table-body&quot;);
    for (let i = 0; i &lt; 4; i++) {
    for (let j = 0; j &lt; 4; j++) {
    const cell = table.rows[i].cells[j];
    cell.textContent = data[i][j];
    }
    }
}