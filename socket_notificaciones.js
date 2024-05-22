var socket = require( 'socket.io' );
var express = require( 'express' );
var http = require( 'http' );

var app = express();
var server = http.createServer( app );

var io = socket.listen( server );

console.log('entra');

io.sockets.on( 'connection', function( client ) {
	console.log( "New client!" );

	if(client.handshake.query['cliente']=='yes'){
		client.join('departamento_'+client.handshake.query['departamento']);
		client.join('usuario_'+client.handshake.query['id_usuario']);
	}
	
	client.on('datos', function( data ) {
		console.log(data);
		io.sockets.to(data.tipo+'_'+data.destinatario).emit( 'notificacion', {data:data} );
	});

	
	
});

server.listen( 27458 );