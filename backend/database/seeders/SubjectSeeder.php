<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = [
            "Matemáticas",
            "Física",
            "Química",
            "Inglés",
            "Historia",
            "Biología",
            "Literatura",
            "Geografía",
            "Programación",
            "Filosofía",
            "Arte",
            "Música",
            "Economía",
            "Psicología",
            "Educación Física",
            "Derecho",
            "Sociología",
            "Estadística",
            "Administración de Empresas",
            "Marketing",
            "Contabilidad",
            "Finanzas",
            "Diseño Gráfico",
            "Arquitectura",
            "Diseño de Interiores",
            "Ciencias Ambientales",
            "Ciencias Políticas",
            "Medicina",
            "Enfermería",
            "Odontología",
            "Farmacia",
            "Nutrición",
            "Comunicación",
            "Periodismo",
            "Relaciones Internacionales",
            "Turismo",
            "Hotelería",
            "Gastronomía",
            "Ciencias de la Computación",
            "Inteligencia Artificial",
            "Redes de Computadoras",
            "Sistemas Operativos",
            "Seguridad Informática",
            "Desarrollo Web",
            "Bases de Datos",
            "Matemáticas Aplicadas",
            "Física Cuántica",
            "Biología Molecular",
            "Genética",
            "Zoología",
            "Botánica",
            "Geología",
            "Ciencias del Medio Ambiente",
            "Arte Moderno",
            "Historia del Cine",
            "Teoría del Arte",
            "Literatura Clásica",
            "Poesía",
            "Teatro",
            "Historia del Arte",
            "Política Económica",
            "Macroeconomía",
            "Microeconomía",
            "Psicología del Desarrollo",
            "Psicología Social",
            "Neurociencia",
            "Psicología Organizacional",
            "Filosofía del Lenguaje",
            "Ética",
            "Filosofía Política",
            "Educación Inclusiva",
            "Educación Especial",
            "Didáctica",
            "Pedagogía",
            "Investigación Educativa",
            "Derecho Penal",
            "Derecho Internacional",
            "Derecho Constitucional",
            "Sociología de la Familia",
            "Sociología del Género",
            "Sociología Urbana",
            "Bioestadística",
            "Estadística Descriptiva",
            "Estadística Inferencial",
            "Liderazgo Organizacional",
            "Gestión del Talento Humano",
            "Marketing Digital",
            "Investigación de Mercados",
            "Contabilidad Financiera",
            "Auditoría",
            "Finanzas Corporativas",
            "Finanzas Personales",
            "Diseño de Logotipos",
            "Diseño Web",
            "Diseño Industrial",
            "Diseño de Moda",
            "Ecología",
            "Biotecnología",
            "Arqueología",
            "Historia Antigua"
        ];

        User
hola
ChatGPT

¡Hola! ¿En qué puedo ayudarte hoy?
User
necesito una api donde pueda obtener datos de materias
ChatGPT

¡Claro! Hay varias APIs que ofrecen datos relacionados con materias o asignaturas. Aquí te mencionaré algunas opciones populares:

    Universidades API: Esta API proporciona información sobre cursos y programas académicos de diversas universidades alrededor del mundo. Puedes obtener detalles sobre las materias, descripciones, requisitos y más.

    Coursera API: Coursera es una plataforma de educación en línea que ofrece una API que permite acceder a información sobre cursos y especializaciones. Puedes obtener datos sobre las materias, duración, calificaciones y más.

    OpenCourseWare API: OpenCourseWare es una iniciativa que proporciona acceso abierto a materiales educativos de nivel universitario. Algunas instituciones educativas tienen APIs que permiten acceder a su contenido, incluyendo datos sobre materias, asignaturas y recursos educativos.

    iTunes U API: iTunes U es una plataforma de Apple que proporciona contenido educativo, incluyendo cursos y materiales de aprendizaje. Puedes utilizar su API para obtener información sobre las materias disponibles, descripciones, materiales y más.

Recuerda que cada API tiene sus propias políticas de acceso y puede requerir autenticación o suscripción para obtener datos. Te recomendaría revisar la documentación de cada una de estas opciones para obtener más información sobre cómo acceder a los datos que necesitas.
User
necesito que los datos esten en español
ChatGPT

Si necesitas datos en español sobre materias o asignaturas, aquí hay algunas opciones:

    UNED API: La Universidad Nacional de Educación a Distancia (UNED) de España ofrece una API que proporciona información sobre asignaturas, programas de estudio, planes de estudios, calificaciones, horarios y más. Puedes obtener datos en español relacionados con las materias ofrecidas por esta universidad.

    Ministerio de Educación API: Algunos países, como España, tienen APIs disponibles a través del Ministerio de Educación. Estas APIs pueden proporcionar datos sobre asignaturas, planes de estudio, programas académicos y más. Puedes consultar el sitio web del Ministerio de Educación de tu país para ver si ofrecen una API o una fuente de datos relacionada.

    Universidades locales: Puedes explorar las universidades locales en tu país y verificar si ofrecen APIs o fuentes de datos en español sobre sus materias y programas de estudio. Muchas instituciones académicas tienen sistemas en línea que brindan información detallada sobre sus asignaturas y cursos.

Al utilizar estas APIs o explorar fuentes de datos locales, asegúrate de revisar la documentación y los términos de uso para comprender cómo acceder a los datos y cumplir con las políticas aplicables.
User
necesito una api que me devuelva resultados json para usarlos en mi applicacion
ChatGPT

Entiendo, si buscas una API que te devuelva resultados en formato JSON para utilizar en tu aplicación, aquí tienes algunas opciones:

    REST Countries: Esta API proporciona información sobre países de todo el mundo, incluyendo datos sobre sus asignaturas. Puedes obtener detalles como el nombre de la materia, nivel educativo, descripción y más. Los datos se devuelven en formato JSON.

    Google Classroom API: Si estás buscando datos relacionados con asignaturas y cursos en un entorno educativo, la API de Google Classroom puede ser una opción. Proporciona acceso a información sobre clases, alumnos, materiales, tareas y más. Los datos se devuelven en formato JSON.

    Universidades API: Esta API mencionada anteriormente también puede proporcionar información sobre materias en formato JSON. Puedes obtener detalles sobre cursos, programas académicos, asignaturas y más de diversas universidades en todo el mundo.

Al utilizar estas APIs, asegúrate de revisar la documentación proporcionada por cada proveedor para comprender cómo realizar las solicitudes, autenticación necesaria y los campos que devolverán en la respuesta JSON.
User
que me devuelva datos de materias como ingles, matematicas, fisica
ChatGPT

Aquí tienes una opción de API que proporciona datos de materias como inglés, matemáticas y física:

API de Open Trivia: La API de Open Trivia te permite obtener preguntas y respuestas de trivia en varios temas, incluyendo materias académicas como inglés, matemáticas, física y más. Aunque no proporciona datos detallados de las materias en sí, te permite obtener preguntas relacionadas con esos temas. Los datos se devuelven en formato JSON.

Puedes acceder a la API de Open Trivia haciendo solicitudes HTTP y especificando los parámetros necesarios, como la categoría o tema de las preguntas (por ejemplo, "9" para ciencia y naturaleza). La respuesta JSON incluirá las preguntas, opciones de respuesta y la respuesta correcta.

Recuerda revisar la documentación de la API para obtener más información sobre cómo utilizarla y qué parámetros puedes utilizar para filtrar las preguntas según tus necesidades específicas.
User
nombres de materias
ChatGPT

Aquí tienes algunos ejemplos de nombres de materias comunes en áreas académicas específicas:

Ciencias:

    Matemáticas
    Física
    Química
    Biología
    Astronomía
    Geología
    Estadística
    Ciencias de la Computación
    Ingeniería

Humanidades:

    Lengua y Literatura
    Historia
    Filosofía
    Arte
    Música
    Idiomas (Inglés, Francés, Español, etc.)
    Sociología
    Antropología
    Psicología

Ciencias Sociales:

    Economía
    Política
    Derecho
    Geografía
    Sociología
    Comunicación
    Administración de Empresas
    Marketing
    Finanzas

Artes y Diseño:

    Diseño Gráfico
    Arquitectura
    Moda
    Cine
    Teatro
    Fotografía
    Bellas Artes
    Diseño de Interiores
    Escultura

Estos son solo ejemplos, ya que los nombres de las materias pueden variar según la institución educativa y el país.
User
las necesito en formato json y obtenerlas de una api
ChatGPT

Lamentablemente, no conozco una API específica que proporcione una lista completa de nombres de materias en formato JSON. Sin embargo, podrías considerar crear tu propia API o utilizar una base de datos existente para almacenar y acceder a los nombres de las materias en formato JSON.

Una posible solución sería crear tu propia API utilizando un framework web como Flask (para Python) o Express (para Node.js) y diseñar una ruta que devuelva una lista de nombres de materias en formato JSON. Puedes almacenar los nombres de las materias en una base de datos o simplemente definirlos directamente en el código.

Aquí hay un ejemplo básico en Python utilizando Flask:

python
from flask import Flask, jsonify

app = Flask(__name__)

@app.route('/materias')
def obtener_materias():
    materias = ['Matemáticas', 'Física', 'Química', 'Inglés', 'Historia']
    return jsonify(materias)

if __name__ == '__main__':
    app.run()

Este código define una ruta /materias que devuelve una lista de materias en formato JSON.

Recuerda que este es solo un ejemplo básico y necesitarás adaptarlo según tus necesidades específicas, como la forma en que almacenas los nombres de las materias y cómo los recuperas en tu API.

Si prefieres utilizar una base de datos existente, puedes buscar bases de datos públicas en línea que contengan información educativa y materias. Una vez que obtengas los datos, puedes exponerlos a través de una API personalizada como se muestra anteriormente.

Recuerda asegurarte de respetar los términos de uso y las políticas de cualquier API o base de datos que utilices para obtener los nombres de las materias.
User
consumir api que me devuelva nombres de materias en json
ChatGPT

Lamentablemente, no tengo acceso a una API específica que devuelva nombres de materias en formato JSON. Sin embargo, puedo mostrarte un ejemplo de cómo consumir una API ficticia que devuelve nombres de materias en formato JSON. Puedes adaptar este ejemplo a tu caso específico.

Supongamos que hay una API ficticia llamada "https://api.example.com/materias" que devuelve una lista de nombres de materias en formato JSON. Aquí tienes un ejemplo de cómo consumirla utilizando JavaScript:

javascript
fetch('https://api.example.com/materias')
  .then(response => response.json())
  .then(data => {
    // Aquí tienes acceso a los datos de las materias en formato JSON
    console.log(data);
    
    // Puedes iterar sobre los nombres de las materias
    data.forEach(materia => {
      console.log(materia.nombre);
    });
  })
  .catch(error => {
    console.error('Error al obtener las materias:', error);
  });

En este ejemplo, utilizamos la función fetch para realizar una solicitud GET a la URL de la API. Luego, utilizamos los métodos json() y then() para procesar la respuesta y obtener los datos en formato JSON. Finalmente, podemos acceder a los nombres de las materias en el objeto data y realizar las operaciones necesarias.

Recuerda que este es solo un ejemplo ficticio para ilustrar cómo consumir una API que devuelve nombres de materias en formato JSON. Necesitarás reemplazar la URL y adaptar el código según la estructura de la respuesta real de la API que estés utilizando.
User
una lista de materias en formato json
ChatGPT

Aquí tienes un ejemplo de una lista de materias en formato JSON:

json
{
  "materias": [
    {
      "nombre": "Matemáticas",
      "nivel": "Básico"
    },
    {
      "nombre": "Física",
      "nivel": "Avanzado"
    },
    {
      "nombre": "Química",
      "nivel": "Intermedio"
    },
    {
      "nombre": "Inglés",
      "nivel": "Intermedio"
    },
    {
      "nombre": "Historia",
      "nivel": "Básico"
    }
  ]
}

En este ejemplo, tenemos una lista de materias representada por el arreglo "materias". Cada materia es un objeto que contiene dos propiedades: "nombre" y "nivel". Puedes agregar más propiedades según tus necesidades, como descripciones, códigos de curso, horas de clase, etc.

Esta estructura te permite acceder a los nombres y niveles de las materias de manera individual. Puedes utilizar esta estructura como base y añadir más objetos de materia a la lista según tus requerimientos.

Recuerda que este es solo un ejemplo y puedes personalizar la estructura y los datos según tus necesidades específicas.
User
necesito una lista de 100 materias en array
ChatGPT

Aquí tienes un ejemplo de una lista de 100 materias en formato JSON utilizando un arreglo:

json
{
  "materias": [
    "Matemáticas",
    "Física",
    "Química",
    "Inglés",
    "Historia",
    "Biología",
    "Literatura",
    "Geografía",
    "Programación",
    "Filosofía",
    "Arte",
    "Música",
    "Economía",
    "Psicología",
    "Educación Física",
    "Derecho",
    "Sociología",
    "Estadística",
    "Administración de Empresas",
    "Marketing",
    "Contabilidad",
    "Finanzas",
    "Diseño Gráfico",
    "Arquitectura",
    "Diseño de Interiores",
    "Ciencias Ambientales",
    "Ciencias Políticas",
    "Medicina",
    "Enfermería",
    "Odontología",
    "Farmacia",
    "Nutrición",
    "Comunicación",
    "Periodismo",
    "Relaciones Internacionales",
    "Turismo",
    "Hotelería",
    "Gastronomía",
    "Ciencias de la Computación",
    "Inteligencia Artificial",
    "Redes de Computadoras",
    "Sistemas Operativos",
    "Seguridad Informática",
    "Desarrollo Web",
    "Bases de Datos",
    "Matemáticas Aplicadas",
    "Física Cuántica",
    "Biología Molecular",
    "Genética",
    "Zoología",
    "Botánica",
    "Geología",
    "Ciencias del Medio Ambiente",
    "Arte Moderno",
    "Historia del Cine",
    "Teoría del Arte",
    "Literatura Clásica",
    "Poesía",
    "Teatro",
    "Historia del Arte",
    "Política Económica",
    "Macroeconomía",
    "Microeconomía",
    "Psicología del Desarrollo",
    "Psicología Social",
    "Neurociencia",
    "Psicología Organizacional",
    "Filosofía del Lenguaje",
    "Ética",
    "Filosofía Política",
    "Educación Inclusiva",
    "Educación Especial",
    "Didáctica",
    "Pedagogía",
    "Investigación Educativa",
    "Derecho Penal",
    "Derecho Internacional",
    "Derecho Constitucional",
    "Sociología de la Familia",
    "Sociología del Género",
    "Sociología Urbana",
    "Bioestadística",
    "Estadística Descriptiva",
    "Estadística Inferencial",
    "Liderazgo Organizacional",
    "Gestión del Talento Humano",
    "Marketing Digital",
    "Investigación de Mercados",
    "Contabilidad Financiera",
    "Auditoría",
    "Finanzas Corporativas",
    "Finanzas Personales",
    "Diseño de Logotipos",
    "Diseño Web",
    "Diseño Industrial",
    "Diseño de Moda",
    "Ecología",
    "Biotecnología",
    "Arqueología",
    "Historia Antigua"
  ]
}

  $subjects500 = [
    "Álgebra Lineal",
    "Análisis Complejo",
    "Análisis Numérico",
    "Cálculo Diferencial",
    "Cálculo Integral",
    "Cálculo Vectorial",
    "Ecuaciones Diferenciales",
    "Geometría Analítica",
    "Geometría Diferencial",
    "Matemática Discreta",
    "Probabilidad",
    "Estadística Matemática",
    "Topología",
    "Física Clásica",
    "Mecánica Clásica",
    "Electromagnetismo",
    "Óptica",
    "Termodinámica",
    "Mecánica Cuántica",
    "Física Estadística",
    "Física de Partículas",
    "Física Nuclear",
    "Física Atómica",
    "Física de Fluidos",
    "Física de Materiales",
    "Física de la Computación",
    "Química General",
    "Química Orgánica",
    "Química Inorgánica",
    "Química Analítica",
    "Química Cuántica",
    "Química Física",
    "Química de Polímeros",
    "Química Industrial",
    "Bioquímica",
    "Biología Celular",
    "Biología Molecular",
    "Genética",
    "Microbiología",
    "Ecología",
    "Biología Evolutiva",
    "Biología Computacional",
    "Bioinformática",
    "Neurociencia",
    "Ciencias de los Materiales",
    "Ciencia de Datos",
    "Mineralogía",
    "Cristalografía",
    "Geología Estructural",
    "Geología del Petróleo",
    "Geofísica",
    "Geodesia",
    "Oceanografía",
    "Meteorología",
    "Sismología",
    "Astrofísica",
    "Astronomía Observacional",
    "Cosmología",
    "Mecánica Celeste",
    "Sistemas Dinámicos",
    "Computación Cuántica",
    "Inteligencia Artificial",
    "Aprendizaje Automático",
    "Procesamiento de Lenguaje Natural",
    "Robótica",
    "Criptografía",
    "Teoría de la Información",
    "Teoría de Grafos",
    "Teoría de Juegos",
    "Teoría de la Complejidad",
    "Algoritmia",
    "Programación Paralela",
    "Bases de Datos",
    "Sistemas Operativos",
    "Redes de Computadoras",
    "Arquitectura de Computadoras",
    "Compiladores",
    "Seguridad Informática",
    "Modelado y Simulación",
    "Análisis de Datos",
    "Visualización de Datos",
    "Bioinformática",
    "Optimización",
    "Investigación Operativa",
    "Modelos Matemáticos",
    "Estadística Aplicada",
    "Matemáticas Aplicadas",
    "Teoría de la Computación",
    "Matemáticas Discretas",
    "Álgebra Abstracta",
    "Teoría de Números",
    "Lógica Matemática",
    "Teoría de Conjuntos",
    "Teoría de Códigos",
    "Teoría de Autómatas",
    "Teoría de Lenguajes Formales",
    "Sistemas Complejos",
    "Física Matemática",
    "Mecánica de Fluidos",
    "Electrodinámica",
    "Física Nuclear",
    "Física de Altas Energías",
    "Física Estadística",
    "Óptica Cuántica",
    "Mecánica Cuántica Relativista",
    "Química Cuántica",
    "Química Computacional",
    "Diseño de Medicamentos",
    "Espectroscopía",
    "Química de Superficies",
    "Química de Materiales",
    "Catálisis",
    "Química Orgánica Sintética",
    "Química de Polímeros",
    "Química Verde",
    "Química Ambiental",
    "Farmacología",
    "Toxicología",
    "Biología Estructural",
    "Biofísica",
    "Biología Computacional",
    "Biología de Sistemas",
    "Biología Evolutiva",
    "Biología del Desarrollo",
    "Biología del Cáncer",
    "Biología Molecular de la Célula",
    "Biología de Plantas",
    "Biología de Invertebrados",
    "Biología de Vertebrados",
    "Microbiología Ambiental",
    "Microbiología Médica",
    "Microbiología Industrial",
    "Ecología de Poblaciones",
    "Ecología de Comunidades",
    "Ecología de Ecosistemas",
    "Ecología Microbiana",
    "Conservación de la Biodiversidad",
    "Ecología del Paisaje",
    "Ecología del Comportamiento",
    "Geología del Petróleo",
    "Geofísica Aplicada",
    "Geología Ambiental",
    "Geología de Minas",
    "Geología Estructural",
    "Geología del Cuaternario",
    "Geología Sedimentaria",
    "Geología Marina",
    "Geoquímica",
    "Geohidrología",
    "Geotermia",
    "Geotécnia",
    "Paleontología",
    "Tectónica",
    "Astronomía Observacional",
    "Astrofísica Estelar",
    "Astrofísica Galáctica",
    "Astrofísica Extragaláctica",
    "Cosmología",
    "Mecánica Celeste",
    "Astrometría",
    "Instrumentación Astronómica",
    "Computación Cuántica",
    "Física de la Información Cuántica",
    "Física de Sistemas Cuánticos",
    "Inteligencia Artificial",
    "Aprendizaje Automático",
    "Robótica",
    "Visión por Computadora",
    "Procesamiento de Imágenes",
    "Procesamiento de Señales",
    "Reconocimiento de Patrones",
    "Algoritmos Genéticos",
    "Computación Evolutiva",
    "Redes Neuronales",
    "Criptografía",
    "Teoría de la Información",
    "Teoría de Grafos",
    "Teoría de Juegos",
    "Teoría del Caos",
    "Complejidad Computacional",
    "Computación Distribuida",
    "Sistemas Multiagente",
    "Sistemas Embebidos",
    "Arquitectura de Computadoras",
    "Sistemas Operativos",
    "Redes de Computadoras",
    "Bases de Datos",
    "Compiladores",
    "Lenguajes de Programación",
    "Ingeniería de Software",
    "Verificación y Validación de Software",
    "Programación Concurrente",
    "Seguridad Informática",
    "Computación Gráfica",
    "Realidad Virtual",
    "Simulación",
    "Interacción Humano-Computadora",
    "Sistemas de Información Geográfica",
    "Big Data",
    "Minería de Datos",
    "Estadística Aplicada",
    "Estadística Computacional",
    "Estadística Espacial",
    "Estadística Bayesiana",
    "Estadística Multivariante",
    "Estadística No Paramétrica",
    "Análisis de Regresión",
    "Análisis de Varianza",
    "Diseño de Experimentos",
    "Modelos de Series Temporales",
    "Estadística Actuarial",
    "Bioinformática",
    "Computación Biomédica",
    "Matemáticas Aplicadas",
    "Optimización",
    "Investigación Operativa",
    "Simulación Estocástica",
    "Modelos Matemáticos",
    "Control Automático",
    "Teoría de Control",
    "Electrónica",
    "Circuitos Eléctricos",
    "Señales y Sistemas",
    "Teoría Electromagnética",
    "Electrónica de Potencia",
    "Dispositivos Electrónicos",
    "Instrumentación Electrónica",
    "Comunicaciones",
    "Telecomunicaciones",
    "Redes de Telecomunicaciones",
    "Teoría de la Información",
    "Procesamiento de Señales",
    "Teoría del Caos",
    "Sistemas Embebidos",
    "Microelectrónica",
    "Nanotecnología",
    "Física de Materiales",
    "Ciencia de Materiales",
    "Materiales Semiconductores",
    "Materiales Magnéticos",
    "Materiales Ópticos",
    "Polímeros",
    "Materiales Compuestos",
    "Materiales Cerámicos",
    "Materiales Metálicos",
    "Diseño de Materiales",
    "Caracterización de Materiales",
    "Procesamiento de Materiales",
    "Fisicoquímica de Materiales",
    "Biomateriales",
    "Ingeniería Ambiental",
    "Ingeniería de Recursos Hídricos",
    "Ingeniería Sanitaria",
    "Ingeniería de Suelos",
    "Gestión Ambiental",
    "Impacto Ambiental",
    "Tratamiento de Aguas",
    "Tratamiento de Residuos",
    "Hidrología",
    "Hidrogeología",
    "Modelos Hidrológicos",
    "Meteorología",
    "Contaminación Ambiental",
    "Energías Renovables",
    "Eficiencia Energética",
    "Ingeniería Nuclear",
    "Estructuras",
    "Diseño Estructural",
    "Análisis Estructural",
    "Mecánica de Suelos",
    "Geotecnia",
    "Mecánica de Rocas",
    "Dinámica de Estructuras",
    "Ingeniería Sísmica",
    "Ingeniería de Puentes",
    "Ingeniería de Túneles",
    "Ingeniería de Presas",
    "Ingeniería del Hormigón",
    "Ingeniería de Materiales",
    "Ingeniería de Transporte",
    "Ingeniería Vial",
    "Planificación del Transporte",
    "Operaciones de Transporte",
    "Logística",
    "Puertos y Vías Navegables",
    "Aeropuertos",
    "Ingeniería Industrial",
    "Investigación de Operaciones",
    "Gestión de la Producción",
    "Gestión de la Calidad",
    "Gestión de Proyectos",
    "Ergonomía",
    "Ingeniería del Trabajo",
    "Ingeniería de Mantenimiento",
    "Sistemas de Gestión Empresarial",
    "Economía de la Empresa",
    "Marketing",
    "Finanzas",
    "Gestión de Recursos Humanos",
    "Gestión de la Innovación",
    "Gestión de la Tecnología",
    "Negocios Internacionales",
    "Emprendimiento",
    "Gestión del Conocimiento",
    "Liderazgo y Gestión del Cambio",
    "Comportamiento Organizacional",
    "Derecho Comercial",
    "Derecho Laboral",
    "Derecho de la Propiedad Intelectual",
    "Derecho Internacional",
    "Derecho Ambiental",
    "Derecho Tributario",
    "Derecho Administrativo",
    "Derecho Penal",
    "Derecho Civil",
    "Derecho Constitucional",
    "Derecho Procesal",
    "Derecho de Familia",
    "Derecho del Trabajo",
    "Derecho Notarial",
    "Derecho Mercantil",
    "Derecho Bancario",
    "Derecho Financiero",
    "Derecho de la Seguridad Social",
    "Derecho de las Telecomunicaciones",
    "Derecho Informático",
    "Derecho de la Salud",
    "Sociología",
    "Antropología",
    "Psicología",
    "Comunicación",
    "Relaciones Públicas",
    "Periodismo",
    "Publicidad",
    "Marketing",
    "Estudios de Medios",
    "Investigación de Mercados",
    "Historia",
    "Geografía",
    "Filosofía",
    "Arte",
    "Música",
    "Literatura",
    "Cine",
    "Teatro",
    "Educación",
    "Pedagogía",
    "Didáctica",
    "Psicopedagogía",
    "Orientación Educativa",
    "Tecnología Educativa",
    "Educación Especial",
    "Educación Inclusiva",
    "Educación Física",
    "Deporte",
    "Recreación",
    "Turismo",
    "Hotelería",
    "Gastronomía",
    "Administración de Empresas",
    "Administración Pública",
    "Contabilidad",
    "Economía",
    "Finanzas",
    "Comercio Internacional",
    "Relaciones Internacionales",
    "Ciencia Política",
    "Diplomacia",
    "Gestión Pública",
    "Marketing",
    "Recursos Humanos",
    "Negocios Internacionales",
    "Emprendimiento",
    "Logística",
    "Gestión de Proyectos",
    "Gestión de la Innovación",
    "Gestión del Conocimiento",
    "Gestión Ambiental",
    "Turismo",
    "Hotelería",
    "Gastronomía"
  ];

  /*
  Materia
Matemáticas I
Física I
Química General
Introducción a la Programación
Economía I
Historia del Arte
Inglés I
Biología Celular
Psicología General
Estadística Descriptiva
Derecho Constitucional
Microeconomía
Literatura Universal
Anatomía Humana
Fundamentos de Administración
Introducción a la Sociología
Álgebra Lineal
Física II
Química Orgánica
Programación Orientada a Objetos
Economía II
Historia del Mundo Contemporáneo
Inglés II
Genética
Psicología del Desarrollo
Estadística Inferencial
Derecho Civil
Macroeconomía
Literatura Comparada
Fisiología Humana
Contabilidad Financiera
Sociología de la Educación
Cálculo Integral
Física III
Bioquímica
Estructuras de Datos
Economía Internacional
Historia de la Filosofía
Inglés III
Microbiología
Psicopatología
Investigación de Operaciones
Derecho Mercantil
Economía del Trabajo
Teoría del Arte
Neurociencia
Marketing
Antropología Social
Cálculo Vectorial
Física Cuántica
Química Analítica
Programación Avanzada
Economía III
Historia del Cine
Inglés IV */


/*
Materia
Inglés Básico I
Francés Elemental I
Alemán para Principiantes I
Español para Extranjeros I
Italiano Inicial I
Chino Mandarín Nivel Básico I
Japonés para Principiantes I
Ruso Elemental I
Árabe Básico I
Portugués Inicial I
Coreano para Principiantes I
Holandés para Principiantes I
Sueco Elemental I
Noruego Básico I
Danés para Principiantes I
Finés Inicial I
Polaco para Principiantes I
Hindi Básico I
Turco Elemental I
Hebreo Inicial I
*/

/*
Inglés I
Francés I
Alemán I
Español I
Italiano I
Chino Mandarín I
Japonés I
Ruso I
Árabe I
Portugués I
Coreano I
Holandés I
Sueco I
Noruego I
Danés I
Finés I
Polaco I
Hindi I
Turco I
Hebreo I
*/

    }
}
