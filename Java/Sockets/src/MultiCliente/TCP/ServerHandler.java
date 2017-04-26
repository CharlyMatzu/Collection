
package MultiCliente.TCP;

import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;
import java.util.List;


class ServerHandler extends Thread{
    
    private ServerSocket server;
    private ServerSocket mainServerSocket;
    private Socket mainClientSocket;
    private ServerThread serverThread;
    private Socket cliente;
    protected static int PUERTO;
    
    private List<Socket> clientes;

    public ServerHandler( int port ) {
        this.clientes = new ArrayList<>();
        ServerHandler.PUERTO = port;
    }
    
    
    public static void mensajes(String msj){
        synchronized(System.out){
            System.out.println(msj);
        }
    }
    
    public void iniciarServidor(){
        try {
            server = new ServerSocket(ServerHandler.PUERTO);
            ServerHandler.mensajes("Escuchando en el puerto: "+ ServerHandler.PUERTO);
            this.start();
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    
    @Override
    public void run(){
        while( true ){
            
            try {
                
                ServerHandler.mensajes("Esperando clientes...");
                cliente = server.accept();
                //clientes.add(cliente);
                ServerHandler.mensajes("Cliente conectado");
                serverThread = new ServerThread(this, cliente);
                serverThread.iniciar();
                
                
            } catch (Exception e) {
                e.printStackTrace();
            }
            
        }
    }
    
    
    public static void main(String[] args) {
        new ServerHandler(9000).iniciarServidor();
    }
    
}
