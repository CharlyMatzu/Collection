
package Chat1.cliente;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.ConnectException;
import java.net.Socket;
import java.net.SocketException;


public class Cliente extends Thread{
    
    private Socket socket;
    private DataInputStream entrada;
    private DataOutputStream salida;
    private final String host;
    private final int puerto;
    private final String nombre;
    private static int clientCont = 1;
    private final FrmCliente frmCliente;
    private boolean isSocketON;
    
//    public Cliente(FrmCliente frm, String host, int puerto) {
//        this.frmCliente = frm;
//        this.host = host;
//        this.puerto = puerto;
//        this.nombre = "Cliente "+ Cliente.clientCont++;
//    }

    public Cliente(FrmCliente frm, String host, int puerto, String nombre) throws IOException, ConnectException {
        this.frmCliente = frm;
        this.host = host;
        this.puerto = puerto;
        this.nombre = nombre;
        initSocket();
    }
    
    
    /**
     * Método que crea los flujos de entrada y salida de datos
     * @throws IOException 
     */
    private void initSocket() throws IOException, ConnectException {
        System.out.println("Conectando a servidor...");
        socket = new Socket(host, puerto);
        System.out.println("Conectado a servidor");
        
        //Entrada
        entrada = new DataInputStream( socket.getInputStream() );
        //Saluda
        salida = new DataOutputStream( socket.getOutputStream() );
        
        
        if( !this.isAlive() )
            this.start();
    }
    
    
    @Override
    public void run(){
        isSocketON = true;
        
        while( isSocketON ){
            leerMsg();
        }
        
        if( !socket.isClosed() )
            desconectarSocket();
    }
    
    
    
    public void stopSocket(){
        this.isSocketON = false;
    }
    
    
    public void enviarMsg(String msg){
        try {
            salida.writeUTF(msg);
        } catch (IOException e) { 
            stopSocket();
        } 
    }
    
    
    public void leerMsg(){
        try {
            String texto = entrada.readUTF();
            this.frmCliente.receiveMsg(texto);
        } catch (IOException e) { 
            stopSocket();
        } 
    }
    
    
    public void desconectarSocket(){
        stopSocket();
        try {
            entrada.close();
            salida.close();
            socket.close();
            System.out.println("#Desconectado");
            //Cambiando estado en GUI
            frmCliente.setStateDisconnected();
            frmCliente.addToHistory("#Desconectado del servidor");
        } catch (IOException e) { e.printStackTrace(); }
    }
    
    
    
}

    
