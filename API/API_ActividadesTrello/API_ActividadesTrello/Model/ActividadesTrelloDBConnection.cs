using API_ActividadesTrello.Entities;
using Microsoft.Data.SqlClient;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace API_ActividadesTrello.Model
{
    public class ActividadesTrelloDBConnection
    {

        private SqlConnection connection;
        public ActividadesTrelloDBConnection()
        {
            connection = new SqlConnection("SERVER=localhost; DATABASE=actividades_trello; User Id=TrelloUser; Password=123456");
            connection.Open();
        }

        public string ModificarActividad(int id_actividad, string nombre_actividad, string descripcion_actividad, string estatus)
        {
            string resultado;
            try
            {
                SqlCommand command = new SqlCommand("UPDATE dbo.actividades set nombre_actividad = '" + nombre_actividad + "', descripcion_actividad = '" + descripcion_actividad + "', estatus = '" + estatus + "' where id_actividad = " + id_actividad, connection);
                SqlDataReader reader = command.ExecuteReader();
                reader.Close();
                resultado = "EXITO-MODIFICAR";
            } catch (Exception e)
            {
                resultado = "ERROR-MODIFICAR";
            }
            connection.Close();
            return resultado;
            
        }

        public string ModificarUsuario(int id_usuario, string nombre_completo, string password, string correo)
        {
            string resultado;
            try
            {
                SqlCommand command = new SqlCommand("UPDATE dbo.usuarios set nombre_completo = '" + nombre_completo + "', password = '" + password + "', correo = '" + correo + "' where id_usuario=" + id_usuario, connection);
                SqlDataReader reader = command.ExecuteReader();
                reader.Close();
                resultado = "EXITO-MODIFICAR";
            } catch (Exception e)
            {
                resultado = "ERROR-MODIFICAR";
            }
            connection.Close();
            return resultado;
        }
        public string EliminarUsuario(int id_usuario)
        {
            string resultado;
            try
            {
                SqlCommand command = new SqlCommand("DELETE FROM [dbo].[usuarios] WHERE id_usuario = " + id_usuario, connection);
                SqlDataReader reader = command.ExecuteReader();
                reader.Close();
                resultado = "EXITO-ELIMINACION";
            } catch (Exception e)
            {
                resultado = "ERROR-ELIMINACION";
            }
            return resultado;
        }

        public string EliminarActividad(int id_actividad)
        {
            string resultado;

            try
            {
                SqlCommand command = new SqlCommand("DELETE FROM [dbo].[actividades] WHERE id_actividad = " + id_actividad, connection);
                SqlDataReader reader = command.ExecuteReader();
                reader.Close();
                resultado = "EXITO-ELIMINACION";
            } catch (Exception e)
            {
                resultado = "ERROR-ELIMINACION";
            }
            connection.Close();
            return resultado;
        }

        public string RegistrarNuevoUsuario(string nombre_completo, string nombre_usuario, string password, string correo, string rol)
        {
            string resultado;

            try
            {
                SqlCommand command = new SqlCommand("INSERT INTO dbo.usuarios (nombre_completo, nombre_usuario, password, correo, rol) VALUES ('" + nombre_completo + "', '" + nombre_usuario + "', '" + password + "', '" + correo + "', '" + rol + "')", connection);
                SqlDataReader reader = command.ExecuteReader();
                reader.Close();
                resultado = "EXITO-REGISTRO";
            } catch (Exception e)
            {
                resultado = "ERROR-REGISTRO";
            }
            connection.Close();
            return resultado;
        }

        public string RegistrarNuevaActividad(string nombre_actividad, string descripcion_actividad, string estatus, int id_usuario)
        {
            string resultado;

            try
            {
                SqlCommand command = new SqlCommand("INSERT INTO dbo.actividades (nombre_actividad, descripcion_actividad, estatus, id_usuario) VALUES ('" + nombre_actividad + "', '" + descripcion_actividad + "', '" + estatus + "', " + id_usuario + ")", connection);

                SqlDataReader reader = command.ExecuteReader();
                reader.Close();
                resultado = "EXITO-REGISTRO";
            } catch (Exception e)
            {
                Console.WriteLine(e.StackTrace);
                resultado = "ERROR-REGISTRO";
            }
            connection.Close();
            return resultado;
        }

        public Actividad ObtenerActividad(int id_actividad)
        {
            Actividad actividad = new Actividad();
            SqlCommand command = new SqlCommand("SELECT * FROM dbo.actividades WHERE id_actividad=" + id_actividad, connection);
            SqlDataReader reader = command.ExecuteReader();
            while(reader.Read())
            {
                actividad.id_actividad = (int) reader["id_actividad"];
                actividad.nombre_actividad = reader["nombre_actividad"].ToString();
                actividad.descripcion_actividad = reader["descripcion_actividad"].ToString();
                actividad.estatus = reader["estatus"].ToString();
                actividad.id_usuario = (int) reader["id_usuario"];
            }
            reader.Close();
            connection.Close();
            return actividad;
        }

        public Usuario obtenerUsuarioModel(int id_usuario)
        {
            Usuario usuario = new Usuario();
            SqlCommand command = new SqlCommand("SELECT * FROM dbo.usuarios WHERE id_usuario=" + id_usuario, connection);
            SqlDataReader reader = command.ExecuteReader();
            while(reader.Read())
            {
                usuario.id_usuario = (int)reader["id_usuario"];
                usuario.nombre_completo = reader["nombre_completo"].ToString();
                usuario.nombre_usuario = reader["nombre_usuario"].ToString();
                usuario.password = reader["password"].ToString();
                usuario.correo = reader["correo"].ToString();
                usuario.rol = reader["rol"].ToString();
                usuario.token_acceso = reader["token_acceso"].ToString();
            }
            reader.Close();
            connection.Close();
            return usuario;
        }

        public List<Actividad> ConsultarActividades(int id_usuario)
        {
            List<Actividad> actividades = new List<Actividad>();
            SqlCommand command = new SqlCommand("SELECT * FROM dbo.actividades WHERE id_usuario=" + id_usuario, connection);
            SqlDataReader reader = command.ExecuteReader();
            while(reader.Read())
            {
                Actividad actividad = new Actividad();
                actividad.id_actividad = (int) reader["id_actividad"];
                actividad.nombre_actividad = reader["nombre_actividad"].ToString();
                actividad.descripcion_actividad = reader["descripcion_actividad"].ToString();
                actividad.estatus = reader["estatus"].ToString();
                actividad.id_usuario = (int)reader["id_usuario"];
                actividades.Add(actividad);
                Console.WriteLine("Nombre tarea: " + actividad.nombre_actividad);
            }
            reader.Close();
            connection.Close();
            return actividades;
        }

        public List<Usuario> ConsultarUsuarios()
        {
            List<Usuario> usuarios = new List<Usuario>();
            SqlCommand command = new SqlCommand("SELECT * FROM dbo.usuarios", connection);
            SqlDataReader reader = command.ExecuteReader();
            while(reader.Read())
            {
                Usuario usuario = new Usuario();
                usuario.id_usuario = (int) reader["id_usuario"];
                usuario.nombre_completo = reader["nombre_completo"].ToString();
                usuario.nombre_usuario = reader["nombre_usuario"].ToString();
                usuario.password = reader["password"].ToString();
                usuario.correo = reader["correo"].ToString();
                usuario.rol = reader["rol"].ToString();
                usuario.token_acceso = reader["token_acceso"].ToString();
                usuarios.Add(usuario);
            }
            reader.Close();
            connection.Close();
            return usuarios;
        }

        public Usuario Logear(string nombre_usuario, string password)
        {
            Usuario usuario = new Usuario();
            string resultado = "";
            SqlCommand command = new SqlCommand("if exists (select * from dbo.usuarios where nombre_usuario='"+nombre_usuario+"' AND password='"+password+"') select resultado='true' else select resultado='false' return", connection);
            SqlDataReader reader = command.ExecuteReader();
            while (reader.Read())
            {
                resultado = reader["resultado"].ToString();
            }
            reader.Close();
            if ("true".Equals(resultado))
            {
                string token_acceso = GenerarTokenAcceso();
                IngresarTokenAcceso(token_acceso, nombre_usuario, password);
                SqlCommand commandSelect = new SqlCommand("select * from dbo.usuarios where nombre_usuario = '" + nombre_usuario + "' AND password = '" + password + "'", connection);
                SqlDataReader readerSelect = commandSelect.ExecuteReader();
                
                while (readerSelect.Read())
                {
                    usuario.id_usuario = (int)readerSelect["id_usuario"];
                    usuario.nombre_completo = readerSelect["nombre_completo"].ToString();
                    usuario.nombre_usuario = readerSelect["nombre_usuario"].ToString();
                    usuario.password = readerSelect["password"].ToString();
                    usuario.correo = readerSelect["correo"].ToString();
                    usuario.rol = readerSelect["rol"].ToString();
                    usuario.token_acceso = readerSelect["token_acceso"].ToString();
                }
                readerSelect.Close();
            } else
            {
                usuario.id_usuario = 0;
                usuario.nombre_completo = "NotMatch";
                usuario.nombre_usuario = "NotMatch";
                usuario.password = "NotMatch";
                usuario.correo = "NotMatch";
                usuario.rol = "NotMatch";
                usuario.token_acceso = "NotMatch";
            }
            connection.Close();

            return usuario;
        }

        private void IngresarTokenAcceso(string token_acceso, string nombre_usuario, string password)
        {

            SqlCommand commandToken = new SqlCommand("UPDATE dbo.usuarios set token_acceso = '" + token_acceso + "' where nombre_usuario='" + nombre_usuario + "' AND password='" + password + "'", connection);
            SqlDataReader readerToken = commandToken.ExecuteReader();
            readerToken.Close();
        }

        private string GenerarTokenAcceso()
        {
            Random random = new Random();
            const string chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
            return new string(Enumerable.Repeat(chars, 5)
                    .Select(s => s[random.Next(s.Length)]).ToArray());
        }
    }
}
