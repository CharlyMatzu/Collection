
package Chat.TCPPeerToPeer;


import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;


public class Servidor extends Thread{
    
    private Socket socket;
    private ServerSocket server;
    private DataInputStream entrada;
    private DataOutputStream salida;
    private final int puerto;
    private final FrmComputer frmServidor;
    
    
    
    public Servidor(FrmComputer frm, int puerto){
        this.frmServidor = frm;
        this.puerto = puerto;
    }
    
    
    public void iniciarServidor() throws IOException{
        this.server = new ServerSocket(puerto);
        System.out.println("Servidor escuchando en el puerto: " +puerto);
        this.start();
    }
    
    
    public int getIP(){
        if( server != null )
            return server.getLocalPort();
        return -1;
    }
    
    
    
    
    private void desconectarServidor(){
        try {
            entrada.close();
            socket.close();
            server.close();
            System.out.println("#Cliente desconectado");
        } catch (IOException e) { e.printStackTrace(); }
    }
    
    
    
    
    @Override
    public void run(){
        
        //siempre estará conectado
        while( true ){
            
            try {
               
                //En espera de cliente
                FrmComputer.consoleLog("Esperando cliente...");
                socket = server.accept();
                FrmComputer.consoleLog("Cliente conectado");
                entrada = new DataInputStream( socket.getInputStream() );
                salida = new DataOutputStream( socket.getOutputStream() );
                //Lee mensaje al conectarse
                String msj = entrada.readUTF();
                //Responde para que cliente se desconecte
                salida.writeUTF(".");
                
                //Muestra mensaje
                frmServidor.recibirMensaje( msj );
                
                //Cierra conexion con cliente
                //socket.close();
               
                
            } catch (IOException e) {
                e.printStackTrace();
                desconectarServidor();
                break; //termina ciclo
            }
            
        }
    }

    
    
}

    
