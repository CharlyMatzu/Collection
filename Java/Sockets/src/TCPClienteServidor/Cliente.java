
package TCPClienteServidor;


import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.Socket;

public class Cliente {
    public static void main(String[] args) {
        
        String host = "127.0.0.1";
        int puerto = Servidor.PUERTO;
        Socket servidor;
        DataInputStream entrada;
        DataOutputStream salida;
        
        
        try {
            //Se establece conexión
            servidor = new Socket(host, puerto);
            //Flujo de salida del servidor (enviarle mensajes)
            salida = new DataOutputStream( servidor.getOutputStream() );
            salida.writeUTF("Hola mundo");
            
            
            
            
            //Se obtiene método de entrada del servidor
            entrada = new DataInputStream( servidor.getInputStream() );
            String mensaje = entrada.readUTF();
            System.out.println("Servidor dice: " + mensaje );
            
            
            
            
        } catch (IOException e) {
            System.out.println( e.getMessage() );
        }
        
        
    }
}

