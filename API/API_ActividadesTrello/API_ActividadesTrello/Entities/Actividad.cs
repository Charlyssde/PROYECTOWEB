using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Threading.Tasks;

namespace API_ActividadesTrello.Entities
{
    public class Actividad
    {
        [Key]
        public int id_actividad { get; set; }

        public string nombre_actividad { get; set; }
        public string descripcion_actividad { get; set; }
        public string estatus { get; set; }
        public int id_usuario { get; set; }
    }
}
