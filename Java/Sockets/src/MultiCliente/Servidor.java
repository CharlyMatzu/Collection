
package MultiCliente;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;


public class Servidor extends Thread{
    
    private String nombre;
    //Entrada/Salida
    private DataInputStream entrada;
    private DataOutputStream salida;
    //Conexion
    private ServerSocket socketServidor;
    private Socket cliente;
    private int puerto;

    
    public Servidor(int puerto) {
        this.puerto = puerto;
        initSocket();
    }

    private void initSocket(){
        //Iniciar conexion con el servidor
        try {
            socketServidor = new ServerSocket(puerto);
            System.out.println("Esperando cliente");
            cliente = socketServidor.accept();
            //Se cierra socket del servidor
            socketServidor.close();
            
            //Flujo de entrada
            entrada = new DataInputStream( cliente.getInputStream() );
            //Lee mensaje de cliente
            System.out.println( "Cliente: "+ entrada.readUTF() );
            
            //Flujo de Saluda
            salida = new DataOutputStream( cliente.getOutputStream() );
            salida.writeUTF("HOLA COMO ESTAS");
            
            desconectar();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    
    
    private void desconectar(){
        try {
            entrada.close();
            salida.close();
            cliente.close();
            System.out.println("#Cliente desconectado");
        } catch (IOException e) { e.printStackTrace(); }
    }
    
    
    public static void main(String[] args) {
        new Servidor(9000);
    }

    
    @Override
    public void run() {
        
    }
    
    
    
}
