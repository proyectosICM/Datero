var mysql = require('mysql');

const connection = mysql.createConnection({
    host:"192.168.1.137",
    port:3306,
    database:"datero",
    user:"laptop",
    password:"dakar",
});

connection.connect(function(error){
    if(error){
        throw error;
    }
    else{
        console.log("Conexión a MySQL OK");
    }
})


//SELECT bus n
connection.query('SELECT * FROM bus1', function(error, results){
    if (error){
        throw error;
    }
    results.forEach(result => {
        console.log(result);
    });

});

/*
//SELECT usuario
connection.query('SELECT * FROM usuarios', function(error, results){
    if (error){
        throw error;
    }
    results.forEach(result => {
        console.log(result);
    });

});

//INSERT
connection.query('INSERT INTO usuarios (Nombre, ApellidoPaterno, ApellidoMaterno) VALUES ("Isaac", "Rojas", "Carranza")', function(error, results){
    if (error){
        throw error;
    }
    console.log("¡Registro agregado!", results);  
});

//UPDATE
conection.query('UPDATE usuarios SET Nombre = "Pedro", ApellidoPaterno = "Lopez", ApellidoMaterno = "Campos", Numero = "952736507" WHERE idUsuario = 3', function(error, results){
    if (error){
        throw error;
    }
    console.log("¡Registro actualizado!", results);  
});

*/