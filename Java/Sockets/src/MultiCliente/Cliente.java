
package MultiCliente;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.Socket;


public class Cliente {
    
    private String nombre;
    //Entrada/Salida
    private DataInputStream entrada;
    private DataOutputStream salida;
    //Conexion
    private Socket servidor;
    private int puerto;
    private String ip;

    
    public Cliente(String nombre, String ip, int puerto) {
        this.nombre = nombre;
        this.puerto = puerto;
        this.ip = ip;
        initSocket();
    }

    private void initSocket() {
        //Iniciar conexion con el servidor
        try {
            servidor = new Socket(ip, puerto);
            //Flujo de Saluda
            salida = new DataOutputStream( servidor.getOutputStream() );
            salida.writeUTF("HOLA SERVER, SOY " + getNombre());
            //Flujo de entrada
            entrada = new DataInputStream( servidor.getInputStream() );
            System.out.println( "Servidor: "+ entrada.readUTF() );
            
            desconectar();
        } catch (IOException e) {
            e.printStackTrace();
        }
    }
    
    
    private void desconectar(){
        try {
            entrada.close();
            salida.close();
            servidor.close();
            System.out.println("#Desconectado del servidor");
        } catch (IOException e) { e.printStackTrace(); }
    }

    public String getNombre() {
        return nombre;
    }

    public void setNombre(String nombre) {
        this.nombre = nombre;
    }

    public int getPuerto() {
        return puerto;
    }

    public void setPuerto(int puerto) {
        this.puerto = puerto;
    }

    public String getIp() {
        return ip;
    }

    public void setIp(String ip) {
        this.ip = ip;
    }
    
    
    public static void main(String[] args) {
        new Cliente("Carlos", "localhost", 9000);
    }
    
}
