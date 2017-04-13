package BaseDeDatos;

import java.sql.DriverManager;
import java.sql.Connection;
import java.sql.SQLException;
import javax.swing.JOptionPane;

public class Conexion {
    
    //Conexion
    private Connection con;
    
    //Variables
    private String dbname   = "";
    private String user     = "";
    private String pass     = "";
    private String port     = "3306";
    
    String Driver = "com.mysql.jdbc.Driver";
    //String URL=" jdbc:mysql://localhost:"+port+"/" + dbname;
    //String URL="jdbc:mysql://localhost/" + dbname;
    String URL="jdbc:mysql://localhost/" + dbname + "?zeroDateTimeBehavior=convertToNull";
    
    
    
    public Connection getConexion(){
        con = null;
        
        try{
            Class.forName(Driver);
            con = DriverManager.getConnection(URL, user, pass);//usuario, pass
            //conn = DriverManager.getConnection("jdbc:mysql://" + host + ":3306/" + bd, user, pass);
            System.out.println("Conectado con exitos");
            return con;
            
        } catch (ClassNotFoundException | SQLException e){
            JOptionPane.showMessageDialog(null, e.getMessage(), "ERROR", JOptionPane.ERROR_MESSAGE);
            e.printStackTrace();
            return null;
        }
    }//Fin metodo
    
    
    public Connection getStatus(){

        con = null;
        
        try{
            Class.forName(Driver);
            con = DriverManager.getConnection(URL, user, pass);//usuario, pass
            System.out.println("Conectado");
            return con;
            
        } catch (ClassNotFoundException | SQLException e){
            System.out.println("Desconectado");
            return null;
        }
    }//Fin metodo
    
    
    
    //si se deja abierta la conexion, no se podran realizar algunas operaciones
    public void Desconectar(){
        try { con.close(); } catch (Exception e) { /* ignored */ }
    }
    
    
}//Fin clase
