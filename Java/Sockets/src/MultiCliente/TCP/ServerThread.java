
package MultiCliente.TCP;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.IOException;
import java.net.Socket;


class ServerThread extends Thread{
    
    
    private final ServerHandler serverH;
    private final Socket cliente;
    //Entrada/Salida
    private DataInputStream entrada;
    private DataOutputStream salida;

    
    public ServerThread(ServerHandler serverH, Socket cliente) {
        this.serverH = serverH;
        this.cliente = cliente;
        
    }
    
    public void iniciar(){
        this.start();
    }

    public Socket getCliente() {
        return cliente;
    }

    
    private void desconectar() throws IOException{
        entrada.close();
        salida.close();
        cliente.close();
        ServerHandler.mensajes("Cliente desconectado");
    }

    
    @Override
    public void run() {
        
        try {
                
            //Flujo de entrada y salida
            entrada = new DataInputStream( cliente.getInputStream() );
            salida = new DataOutputStream( cliente.getOutputStream() );

            //Lee mensaje de cliente
            ServerHandler.mensajes("Cliente: "+ entrada.readUTF());
            
            //Le responde cualquier cosa para que continue
            salida.writeUTF(".");

            desconectar();

        } catch (IOException e) {
            e.printStackTrace();
        }
        
    }
    
    
    
}
