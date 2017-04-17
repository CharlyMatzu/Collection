
package TCPClienteServidor;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.ServerSocket;
import java.net.Socket;


public class Servidor {
    
    public static void main(String[] args) {
        new Servidor().iniciar();
    }
    
    private ServerSocket servidor;
    //Canal de acceso
    private Socket cliente;
    static final int PUERTO = 9000;
    private DataOutputStream salida;
    private DataInputStream entrada;
    private String mensaje;
    
    public void iniciar(){
        
        try {
            
            //Se establece PUERTO del servidor
            servidor = new ServerSocket( PUERTO );
            //Espera conexiones
            System.out.println("En espera de cliente...");
            cliente = servidor.accept();
            System.out.println("Conexión Aceptada");
            
            
            //Se obtiene el flujo de entrada del cliente (mensajes que envia)
            entrada = new DataInputStream( cliente.getInputStream() );
            //Se lee mensaje y se muestra
            //mensaje = entrada.readUTF();
            mensaje = entrada.readUTF();
            System.out.println("Cliente dice: " + mensaje );
            
            
            //Flujo de saluda del cliente (enviarle mensajes)
            salida = new DataOutputStream( cliente.getOutputStream() );
            //Se envia mensaje
            salida.writeUTF("Adios Mundo");
            
            
            
            //Se cierra streams y socket
            System.out.println("Conecion finalizada");
            servidor.close();
            entrada.close();
            salida.close();
            cliente.close();
            
        } catch (IOException e) {
            System.out.println( e.getMessage() );
        }
        
    }
    
    /*
    //---Obtener datos
            //Bytes
            InputStream entrada = cliente.getInputStream();
            //Tipos primitivos (Integer, Float, String)
            DataInputStream entradaDatos = new DataInputStream (entrada);
            //Objetos y clases
            ObjectInputStream entradaObjetos = new ObjectInputStream (entrada);
            
            //---Enviar datos
            OutputStream salida = cliente.getOutputStream();
            DataOutputStream salidaDatos = new DataOutputStream (salida);
            ObjectOutputStream salidaObjetos = new ObjectOutputStream (salida);
    
    
    //--------------------
    //  DATOS ADICIONALES
    //--------------------
    
    -------Entrada
    Utilizando un BufferedReader para la lectura
    entrada = new BufferedReader( new InputStreamReader( socket.getInputStream() ) );
    
    -------Salida
    utilizando un PrinStream para la escritura
    salida = new PrintStream( socket.getOutputStream() );
    
    */
    
}
