var mysql = require('mysql');
var con = mysql.createConnection({
	host: 'localhost',
	port: 3306,
	user: 'homestead',
	password: 'secret'
});

con.connect(function(err){
	if (err) throw err;

	console.log('connected');

	con.query("CREATE DATABASE IF NOT EXISTS my_node_db", function(err, result){
		if (err) throw err;
		console.log('database made');
	})
});
