using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Security.Cryptography;
using System.Text;
using System.Threading.Tasks;
using API_ActividadesTrello.Entities;
using API_ActividadesTrello.Model;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using Newtonsoft.Json;

namespace API_ActividadesTrello.Controllers
{
    [ApiController]
    [Route("[controller]")]
    public class ActividadesTrelloController : ControllerBase
    {
        
        [HttpGet]
        [Route("listausuarios")]
        public List<Usuario> ListaUsuarios()
        {
            ActividadesTrelloDBConnection conexion = new ActividadesTrelloDBConnection();
            List<Usuario> usuarios = conexion.ConsultarUsuarios();
            return usuarios;
        }

        [HttpGet]
        [Route("logging")]
        public Usuario Logging(string nombre_usuario, string password)
        {
            ActividadesTrelloDBConnection conexion = new ActividadesTrelloDBConnection();
            Usuario usuario = conexion.Logear(nombre_usuario, EncryptPassword(password));
            return usuario;
        }

        [HttpGet]
        [Route("obtenerusuario")]
        public Usuario ObtenerUsuario(int id_usuario)
        {
            ActividadesTrelloDBConnection conexion = new ActividadesTrelloDBConnection();
            Usuario usuario = conexion.obtenerUsuarioModel(id_usuario);
            return usuario;
        }

        [HttpGet]
        [Route("listaactividades")]
        public List<Actividad> ListaActividades(int id_usuario)
        {
            ActividadesTrelloDBConnection conexion = new ActividadesTrelloDBConnection();
            List<Actividad> actividades = conexion.ConsultarActividades(id_usuario);

            return actividades;
        }
        
        [HttpGet]
        [Route("obteneractividad")]
        public Actividad ObtenerActividad(int id_actividad)
        {
            ActividadesTrelloDBConnection conexion = new ActividadesTrelloDBConnection();
            Actividad actividad = conexion.ObtenerActividad(id_actividad);
            return actividad;
        }

        [HttpPost]
        [Route("registraractividad")]
        public string RegistrarActividad(string nombre_actividad, string descripcion_actividad, string estatus, int id_usuario)
        {
            ActividadesTrelloDBConnection conexion = new ActividadesTrelloDBConnection();
            string resultado = conexion.RegistrarNuevaActividad(nombre_actividad, descripcion_actividad, estatus, id_usuario);
            return resultado;
        }

        [HttpPost]
        [Route("registrarusuario")]
        public string RegistrarUsuario(string nombre_completo, string nombre_usuario, string password, string correo, string rol)
        {
            ActividadesTrelloDBConnection conexion = new ActividadesTrelloDBConnection();
            string resultado = conexion.RegistrarNuevoUsuario(nombre_completo, nombre_usuario, EncryptPassword(password), correo, rol);
            return resultado;
        }

        [HttpPut]
        [Route("actualizarusuario")]
        public string ActualizarUsuario(int id_usuario, string nombre_completo, string password, string correo)
        {
            ActividadesTrelloDBConnection conexion = new ActividadesTrelloDBConnection();
            string resultado = conexion.ModificarUsuario(id_usuario, nombre_completo, EncryptPassword(password), correo);
            return resultado;
        }

        [HttpPut]
        [Route("actualizaractividad")]
        public string ActualizarActividad(int id_actividad, string nombre_actividad, string descripcion_actividad, string estatus)
        {
            ActividadesTrelloDBConnection conexion = new ActividadesTrelloDBConnection();
            string resultado = conexion.ModificarActividad(id_actividad, nombre_actividad, descripcion_actividad, estatus);
            return resultado;
        }

        [HttpDelete]
        [Route("eliminaractividad")]
        public string EliminarActividad(int id_actividad)
        {
            ActividadesTrelloDBConnection conexion = new ActividadesTrelloDBConnection();
            string resultado = conexion.EliminarActividad(id_actividad);
            return resultado;
        }

        [HttpDelete]
        [Route("eliminarusuario")]
        public string EliminarUsuario(int id_usuario)
        {
            ActividadesTrelloDBConnection conexion = new ActividadesTrelloDBConnection();
            string resultado = conexion.EliminarUsuario(id_usuario);
            return resultado;
        }

        private string EncryptPassword(string password)
        {
            SHA256 security = SHA256Managed.Create();
            ASCIIEncoding encoding = new ASCIIEncoding();
            byte[] stream = null;
            StringBuilder builder = new StringBuilder();
            stream = security.ComputeHash(encoding.GetBytes(password));
            for (int i = 0; i < stream.Length; i++) builder.AppendFormat("{0:x2}", stream[i]);
            return builder.ToString();
        }

    }
}
