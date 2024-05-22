var mysql = require('mysql');
var con = mysql.createConnection({
  host: "localhost",
  user: "appestev_user",
  password: "[[+l3zPUz6p;",
  database: "appestev_db"
});

con.connect(function(err) {
  if (err) throw err;
  con.query("SELECT estructura FROM tbl_comandos WHERE comando=?",['+RESP:GTTOW'], function (err, result, fields) {
    if (err) throw err;
     var str = JSON.stringify(result);
        rows = JSON.parse(str);

        console.log(result[0].estructura);
    
  });
});