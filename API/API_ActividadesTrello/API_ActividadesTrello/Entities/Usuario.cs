using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Security.Cryptography;
using System.Threading.Tasks;

namespace API_ActividadesTrello.Entities
{
    public class Usuario
    {

        [Key]
        public int id_usuario { get; set; }
        public string nombre_completo { get; set; }
        public string nombre_usuario { get; set; }
        public string password { get; set; }
        public string correo { get; set; }
        public string rol { get; set; }
        public string token_acceso { get; set; }
    }
}
