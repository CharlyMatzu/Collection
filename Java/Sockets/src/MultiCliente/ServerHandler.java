
package MultiCliente;

import java.net.ServerSocket;
import java.net.Socket;
import java.util.ArrayList;
import java.util.List;


public class ServerHandler {
    
    private ServerSocket mainServerSocket;
    private Socket mainClientSocket;
    
    private List<Socket> clientes;
    private List<Servidor> servidores;

    public ServerHandler() {
        this.clientes = new ArrayList<>();
        this.servidores = new ArrayList<>();
    }
    
    
    
}
