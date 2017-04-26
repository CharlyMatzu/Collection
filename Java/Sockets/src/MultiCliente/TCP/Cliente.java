
package MultiCliente.TCP;


import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.Socket;

class Cliente {
    public static void main(String[] args) {
        
        String host = "localhost";
        int puerto = 9000;
        Socket servidor;
        DataInputStream entrada;
        DataOutputStream salida;
        
        
        try {
            //Se establece conexión
            servidor = new Socket(host, puerto);
            System.out.println("Conectado a servidor");
            //Flujo
            salida = new DataOutputStream( servidor.getOutputStream() );
            entrada = new DataInputStream( servidor.getInputStream() );
            //Envia mensaje
            salida.writeUTF("Hola asdadasdasdasdao");
            System.out.println("Mensaje enviado");
            //Espera respuesta
            entrada.readUTF();
            
            //Se cierra
            servidor.close();
            System.out.println("Desconectado de servidor");
            
        } catch (IOException e) {
            e.printStackTrace();
        }
        
        
    }
}

