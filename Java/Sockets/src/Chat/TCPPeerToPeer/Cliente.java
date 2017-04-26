
package Chat.TCPPeerToPeer;


import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.Socket;


class Cliente extends Thread{
    
    private Socket socket;
    private DataInputStream entrada;
    private DataOutputStream salida;
    private final String host;
    private final int puerto;
    private final FrmComputer computer;

    public Cliente(String host, int puerto, FrmComputer computer) {
        this.host = host;
        this.puerto = puerto;
        this.computer = computer;
    }
    
        
    
    
    
    public void enviarMsg(String msg) throws IOException {
        //Inicializa
        FrmComputer.consoleLog("Conectando a servidor...");
        socket = new Socket(host, puerto);
        FrmComputer.consoleLog("Conectado a servidor");
        //Salida
        salida = new DataOutputStream( socket.getOutputStream() );
        //Entrada (para respuesta del servidor
        entrada = new DataInputStream( socket.getInputStream() );
        
        //Envia
        salida.writeUTF(msg);
        //Lee respuesta para continuar
        entrada.readUTF();
        
        desconectarSocket();
        
    }
    
    
    public void desconectarSocket(){
        try {
            salida.close();
            socket.close();
        } catch (IOException e) { 
            e.printStackTrace();
        }
    }

//    @Override
//    public void run() {
//        
//        try {
//            
//        } catch (Exception e) {
//        }
//        
//    }
    
    
    
    
    
}

    

