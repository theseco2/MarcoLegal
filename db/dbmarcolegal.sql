-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2021 a las 04:03:37
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbmarcolegal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `idarticulo` int(11) NOT NULL,
  `idley` int(11) NOT NULL,
  `idtitulo` int(11) NOT NULL,
  `idcapitulo` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(15000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`idarticulo`, `idley`, `idtitulo`, `idcapitulo`, `numero`, `nombre`, `descripcion`) VALUES
(1, 1, 1, 1, 1, 'Protección a la persona', 'El Estado de Guatemala se organiza para proteger a la persona y a la familia; su fin supremo es la realización del bien común. cambios'),
(2, 1, 1, 1, 2, 'Deberes del Estado', 'Es deber del Estado garantizarle a los habitantes de la\r\nRepública la vida, la libertad, la justicia, la seguridad, la paz y el desarrollo integral de la\r\npersona. '),
(3, 3, 8, 3, 1, 'Paga el patrono', 'el patrono debe de pagar al trabajador explatado'),
(4, 1, 1, 1, 3, 'pruebas', 'Pruebs ingreso'),
(5, 1, 2, 4, 4, 'Articulo 4 prueba', 'prueba'),
(6, 4, 10, 6, 1, 'Objeto', 'Este Reglamento tiene por objeto establecer los principios y lineamientos generales que servirán de base a las entidades de intermediación financiera, los administradores y participantes del Sistema de Pagos y Liquidación de Valores de la República Dominicana (SIPARD), a los participantes de los sistemas de pago y liquidación de valores que lo componen; y, a las entidades de apoyo y servicios conexos interconectadas con las entidades de intermediación financiera y con el SIPARD, para procurar la integridad, disponibilidad y confidencialidad de la información, y el funcionamiento óptimo de los sistemas de información y de la infraestructura tecnológica. Asimismo, la adopción e implementación de prácticas para la gestión de riesgos de la Seguridad Cibernética y de la Información, acorde a su naturaleza, tamaño, complejidad, perfil de riesgo e importancia sistémica, conforme a la Ley No.183-02, Monetaria y Financiera de fecha 21 de noviembre del 2002 y sus modificaciones, y a los estándares internacionales en la materia.'),
(7, 4, 10, 6, 2, 'Alcance', 'El alcance de este Reglamento comprende los principios y lineamientos generales que deberán adoptarse para la integridad, disponibilidad y confidencialidad de la información, el funcionamiento óptimo de los sistemas de información y de la infraestructura tecnológica, así como la adopción e implementación de prácticas para la gestión de riesgos de la Seguridad Cibernética y de la Información.'),
(8, 4, 10, 6, 3, 'Ámbito de Aplicación.', 'Las disposiciones establecidas en este Reglamento son de aplicación para las entidades que se identifican a continuación:\r\na) Bancos Múltiples;\r\nb) Bancos de Ahorro y Crédito;\r\nc) Corporaciones de Crédito;\r\nd) Asociaciones de Ahorros y Préstamos;\r\ne) Entidades Públicas de Intermediación Financiera;\r\nf) Administradores de Sistemas de Pago y Liquidación de Valores;\r\ng) Participantes del SIPARD autorizados por la Junta Monetaria; y,\r\nh) Cualquier otro tipo de entidad del SIPARD, que la Junta Monetaria autorice en el futuro.\r\n\r\nPárrafo: La aplicación de este Reglamento se extenderá a las entidades de apoyo y servicios conexos vinculadas, mediante el mantenimiento de una conexión electrónica o el intercambio de información esencial, a través de cualquier medio digital, en la medida en que dicha vinculación pueda comprometer los objetivos del SIPARD.'),
(9, 4, 10, 6, 4, 'Principios Rectores.', 'Este Reglamento tendrá como principios rectores básicos, los siguientes:\r\na) Principio de Cooperación. Cooperar de forma abierta, eficaz y transparente para el intercambio de la información que sea pertinente; y,\r\nb) Principio de Territorialidad. Gestionar los riesgos de Seguridad Cibernética y de la Información en los casos en que la amenaza tenga incidencia en la República Dominicana.'),
(10, 4, 10, 7, 5, 'Definiciones', 'Para efectos de este Reglamento, los términos y conceptos que se detallan a continuación, tendrán los significados siguientes:\r\na) Acceso:\r\nb) Activo de Información:\r\nc) Administrador de un Sistema de Pagos o de Liquidación de Valores:\r\nd) Alta Gerencia:\r\ne) Amenaza:\r\nf) Apetito de Riesgo:\r\ng) Arquitectura Empresarial:\r\nh) Arquitectura de Seguridad Cibernética y de la Información:\r\ni) Ataque:\r\nj) Ataque Cibernético:\r\nk) Autenticación:\r\nl) Ciberespacio:\r\nm) Cifrado:\r\nn) Colaboradores:\r\no) Confidencialidad:\r\np) Consejo:\r\nq) Control de Acceso:\r\nr) Copias de Resguardo:\r\ns) Data:\r\nt) Datos de Carácter Personal:\r\nu) Disponibilidad:\r\nv) Dispositivo Móvil:\r\nw) Documento Digital:\r\nx) Empresa de Adquirencia o Adquirente:\r\ny) Entidad de Apoyo y Servicios Conexos:\r\nz) Entidad de Intermediación Financiera:'),
(11, 4, 10, 9, 6, 'Marco de Trabajo.', 'Las entidades de intermediación financiera, administradores y participantes del SIPARD, entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben establecer las acciones para el desarrollo, implementación y mantenimiento del Programa de Seguridad Cibernética y de la Información.\r\n\r\nPárrafo: En las subsidiarias o sucursales de entidades extranjeras, el marco de trabajo para el Programa de Seguridad Cibernética y de la Información puede ser realizado por la unidad funcional de seguridad cibernética de la casa matriz o una unidad regional especializada, que tenga un mandato para el grupo financiero completo o para la región a la que pertenece la entidad de intermediación financiera que opera en el país.'),
(12, 4, 10, 9, 7, 'Estructura.', 'Las entidades de intermediación financiera, administradores y participantes del SIPARD, entidades públicas de intermediación financiera y las entidades de apoyo y servicios conexos, deben contar con una estructura gerencial y funciones de control de Seguridad Cibernética y de la Información, acordes a su naturaleza, tamaño, complejidad, perfil de riesgo e importancia sistémica. Dicha estructura estará conformada por un comité funcional de seguridad cibernética y de la información, una unidad funcional de seguridad cibernética y de la información y sus respectivas áreas especializadas. El citado comité reportará directamente al consejo. La unidad funcional de seguridad cibernética y de la información dirigirá el programa de seguridad cibernética y de la información, en el marco de las responsabilidades definidas en este Reglamento, podrá ser conformada por las áreas especializadas y estará a cargo del Oficial de Seguridad Cibernética y de la Información.\r\n\r\nPárrafo I: Las labores del comité funcional de seguridad cibernética y de la información podrán ser asumidas por el comité de gestión de riesgos u otro comité de naturaleza similar (los cuales no alterarán su composición en estos casos), para las entidades que, por su naturaleza, tamaño, complejidad, perfil de riesgo e importancia sistémica así lo requieran. En estas entidades, el proceso de gestión integral de riesgos debe tomar en consideración el Programa de Seguridad Cibernética y de la Información, en lo que respecta a la gestión de riesgos de Seguridad Cibernética y de la Información.\r\n\r\nPárrafo II: Las labores del comité funcional de seguridad cibernética y de la información, en el caso de los administradores y participantes de sistemas de pagos y liquidación de valores (SIPARD) y las entidades de apoyo y servicios conexos, pueden ser asumidas por otro comité de naturaleza similar y estructura según lo dispuesto por este Reglamento.\r\n\r\nPárrafo III: El comité funcional de seguridad cibernética y de la información será dirigido por un alto ejecutivo designado por el consejo u órgano societario equivalente y no podrá desempeñar funciones en las unidades funcionales y áreas especializadas de tecnología de la información. Este ejecutivo deberá ser distinto al Oficial de Seguridad Cibernética y de la Información.\r\n\r\nPárrafo IV: Dicha estructura deberá ser revisada por el consejo u órgano societario equivalente, a medida que cambien las estrategias y/o estructura de las entidades de intermediación financiera, administradores y participantes del SIPARD, entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, para verificar su idoneidad e independencia de las áreas de negocios, tecnologías de la información y operaciones.'),
(13, 4, 10, 9, 8, 'Aprobación del Programa de Seguridad Cibernética y de la Información.', 'Las políticas del Programa de Seguridad Cibernética y de la Información de las entidades de intermediación financiera, administradores y participantes del SIPARD, entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben ser sometidos al consejo u órgano societario competente, para su aprobación, por parte del comité funcional de seguridad cibernética a más tardar entre el tercer y sexto mes posterior a la entrada en vigencia de este reglamento.'),
(14, 4, 10, 9, 9, 'Responsabilidades del Comité Funcional de Seguridad Cibernética y de la Información.', 'El comité funcional de seguridad cibernética y de la información asumirá, de manera enunciativa, pero no limitativa, las responsabilidades siguientes:\r\n\r\na) Diseñar los lineamientos funcionales de Seguridad Cibernética y de la Información, y el mantenimiento del Programa de Seguridad Cibernética y de la Información, en consonancia con los objetivos estratégicos de la entidad, determinados por el consejo u órgano societario equivalente;\r\nb) Someter al consejo u órgano societario competente, para su aprobación, las políticas del Programa de Seguridad Cibernética y de la Información;\r\nc) Evaluar la efectividad del Programa de Seguridad Cibernética y de la Información, en consonancia con los objetivos estratégicos de la entidad;\r\nd) Ratificar las decisiones de tratamiento de riesgo, en coordinación con las áreas pertinentes de negocio, previamente presentadas por el Oficial de Seguridad Cibernética y de la Información; y,\r\ne) Comunicar al consejo u órgano societario competente, los resultados de sus valoraciones sobre los aspectos de Seguridad Cibernética y de la Información.'),
(15, 4, 10, 9, 10, 'Oficial de Seguridad Cibernética y de la Información.', 'El personal asignado a este rol, debe contar con la competencia y capacidad requerida para la implementación del programa de la naturaleza descrita en este Reglamento. La función del Oficial de Seguridad Cibernética y de la Información, aunque de naturaleza funcional y operativa, tendrá suficiente jerarquía, según la estructura de cada entidad, para asegurar que cuenta con la autoridad e independencia necesarias para cumplir con sus responsabilidades, debiendo reportar al principal ejecutivo de la entidad o a quien éste delegue.\r\n\r\nPárrafo I: El Oficial de Seguridad Cibernética y de la Información será miembro del comité funcional de seguridad cibernética y de la información, y llevará la agenda concerniente a los aspectos de Seguridad Cibernética y de la Información, en calidad de secretario del comité.\r\n\r\nPárrafo II: El Oficial de Seguridad Cibernética y de la Información podrá pertenecer a otros comités de la entidad, por la naturaleza de su rol.\r\n\r\nPárrafo III: El Oficial de Seguridad Cibernética y de la Información debe reportar periódicamente al Equipo de Respuestas a Incidentes de Seguridad Cibernética y de la Información (CSIRT) un informe de situación de la infraestructura tecnológica bajo su supervisión y cualquier otra información que le sea requerida por el mismo.\r\n\r\nPárrafo IV: Las funciones del Oficial de Seguridad Cibernética y de la Información podrá ser desempeñada por cualquier otro ejecutivo no perteneciente al área de tecnología de la información, cuyas funciones sean compatibles con dicho rol y cumpla con los requisitos de este Reglamento y sus instructivos.'),
(16, 4, 10, 9, 11, 'Responsabilidades del Oficial de Seguridad Cibernética y de la Información.', 'El Oficial de Seguridad Cibernética y de la Información debe cumplir, de manera enunciativa, pero no limitativa, con las responsabilidades siguientes:\r\n\r\na) Desarrollar, implementar y mantener actualizado el Programa de Seguridad Cibernética y de la Información;\r\nb) Implementar las políticas, estándares y procedimientos apropiados para apoyar el Programa de Seguridad Cibernética y de la Información;\r\nc) Asignar las responsabilidades de los miembros que conforman las áreas especializadas;\r\nd) Gestionar las acciones para el tratamiento del riesgo tecnológico en coordinación con las áreas pertinentes del negocio, previa aprobación del comité funcional de seguridad cibernética y de la información;\r\ne) Cumplir con los límites de los niveles de riesgo tecnológico relevantes establecidos por el consejo relacionados con amenazas o incidentes de Seguridad Cibernética y de la Información; y,\r\nf) Definir y evaluar las responsabilidades de los proveedores en lo concerniente a la Seguridad Cibernética y de la Información de los servicios provistos.'),
(17, 4, 10, 9, 12, 'Áreas Especializadas', 'Las entidades de intermediación financiera, administradores y participantes del SIPARD, entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben contar con una o varias áreas especializadas operativas y funcionales, responsables de la ejecución del Programa de Seguridad Cibernética y de la Información, las cuales podrán estar bajo la dependencia del Oficial de Seguridad Cibernética y de la Información.\r\n\r\nPárrafo I: Las áreas especializadas deberán estar conformadas por personal técnico con la competencia y capacidad requerida y con funciones y responsabilidades definidas. Las mismas deberán contar con los recursos necesarios para garantizar la adecuada gestión del Programa de Seguridad Cibernética y de la Información. Cada unidad estará liderada por un profesional designado por el Oficial de Seguridad Cibernética y de la Información.\r\n\r\nPárrafo II. En los casos en que el comité de gestión de riesgos asuma las funciones del comité funcional de seguridad cibernética y de la información, en atención a lo dispuesto en el Párrafo I, del Artículo 7, las áreas especializadas que se conformen, estarían bajo la supervisión del encargado de la unidad de gestión integral de riesgos.'),
(18, 4, 11, 10, 13, 'Gestión de Riesgos Tecnológicos.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben evaluar y tratar adecuadamente los riesgos tecnológicos en sus sistemas de información e infraestructura tecnológica, desde su concepción, desarrollo e implementación, incluyendo entornos y procesos internos, en función del análisis de amenazas, vulnerabilidades, controles, impacto, y apetito de riesgo establecido por cada entidad de intermediación financiera y del alcance de dichas evaluaciones.'),
(19, 4, 11, 10, 14, 'Gestión de Riesgos Tecnológicos en las Entidades Interconectadas.', 'Las entidades de intermediación financiera, deben procurar, de manera periódica, la gestión de riesgos tecnológicos a las entidades interconectadas con las que actualmente mantengan una relación contractual. Cuando la evaluación de riesgos tecnológicos realizada a estas entidades no sea satisfactoria, deben proceder con la desconexión preventiva de la entidad interconectada y con el tratamiento de los riesgos que puedan producirse, tomando en consideración el apetito de riesgo establecido por cada entidad de intermediación financiera. En caso de que la entidad interconectada no realice las acciones correspondientes a la mitigación de sus riesgos de manera adecuada, se procederá a su desconexión definitiva.\r\n\r\nPárrafo I: El apetito de riesgo debe ser establecido por el Consejo u Órgano de Administración superior correspondiente, en base a una clasificación previamente establecida. Las Entidades de Intermediación Financiera, no debe establecer interconexión con entidades cuyo riesgo sea mayor que el definido por su Consejo.\r\n\r\nPárrafo II: En el marco del establecimiento de una nueva relación contractual que procure la interconexión o el intercambio de información con las entidades de intermediación financiera, deben abstenerse de concretizar dicha relación, en caso de que la evaluación de riesgos tecnológicos no sea calificada como satisfactoria, tomando en consideración el apetito de riesgo establecido por cada entidad de intermediación financiera.'),
(20, 4, 11, 10, 15, 'Metodologías para la Gestión de Riesgos Tecnológicos.', 'La gestión de riesgos tecnológicos, deben llevarse a cabo a través de metodologías estructuradas que contemplen la identificación de las amenazas y vulnerabilidades tecnológicas, la probabilidad de ocurrencia y el posible impacto previsto a las operaciones del negocio para determinar el riesgo potencial.\r\n\r\nPárrafo I: Las evaluaciones deben contemplar la divulgación no autorizada de información, la corrupción accidental o deliberada, la manipulación de la información y la disponibilidad de los entornos en cualquier período.\r\n\r\nPárrafo II: Los riesgos tecnológicos deben ser tratados de acuerdo con los requerimientos del negocio y el enfoque aprobado por el comité funcional de seguridad cibernética y de la información.'),
(21, 4, 11, 11, 16, 'Política de Seguridad Cibernética y de la Información.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y las entidades de apoyo y, servicios conexos, deben implementar y mantener una política general o varias políticas segregadas que contemplen los aspectos, procesos y procedimientos para la gestión de la Seguridad Cibernética y de la Información, debiendo dar a conocer dichas políticas a sus colaboradores.'),
(22, 4, 11, 11, 17, 'Contratos con Colaboradores.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben incorporar en los contratos con colaboradores, las responsabilidades generales y específicas de Seguridad Cibernética y de la Información hasta la finalización de los mismos. Los colaboradores deberán firmar un documento formal que establezca tales responsabilidades.\r\n\r\nPárrafo: Para el caso de los contratos que hayan sido perfeccionados de manera verbal o escrita, con colaboradores existentes a la fecha de entrada en vigor de este Reglamento, deben procurar la firma de un documento en el cual se hagan constar los aspectos generales y específicos de Seguridad Cibernética y de la Información, acorde con las responsabilidades de los mismos hasta su finalización. De no ser ésta la práctica, los colaboradores deberán firmar un documento formal que establezca dichas responsabilidades con la periodicidad establecida en el Programa de Seguridad Cibernética y de la Información de cada entidad.'),
(23, 4, 11, 11, 18, 'Cultura de Seguridad Cibernética y de la Información.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben promover una cultura de Seguridad Cibernética y de la Información, contemplando al menos los aspectos siguientes:\r\n\r\na) El establecimiento de programas continuos de sensibilización sobre el rol de los colaboradores en la Seguridad Cibernética y de la Información, el uso correcto de los sistemas de información e infraestructura tecnológica, y la gestión de sus riesgos a través de los programas de inducción, cápsulas informativas, boletines, charlas concernientes a la seguridad y cualquier otro mecanismo de notificación hábil;\r\n\r\nb) La definición de las responsabilidades de los colaboradores relacionados con la Seguridad Cibernética y de la Información en todos los niveles de la organización;\r\n\r\nc) La instauración de programas continuos de capacitación técnica dirigidos a los colaboradores responsables de la Seguridad Cibernética y de la Información; y,\r\n\r\nd) La provisión de los recursos adecuados para apoyar la efectividad de los programas continuos de sensibilización de Seguridad Cibernética y de la Información;'),
(24, 4, 11, 11, 19, 'Gestión de Activos de Información.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben desarrollar un esquema de gestión de activos de información que contemple los aspectos siguientes:\r\n\r\na) Clasificación de Activos de Información: La clasificación de los activos de información, se llevará a cabo de acuerdo con el nivel de confidencialidad y sensibilidad de la información que gestionan;\r\n\r\nb) Gestión de Documentos: Los documentos deben ser manejados de una manera sistemática y estructurada, debiéndose cumplir con los requisitos de Seguridad Cibernética y de la Información durante el ciclo de vida del documento;\r\n\r\nc) Información Sensible en Formato Físico: La información sensible en formato físico, debe protegerse contra la corrupción, la pérdida o la divulgación no autorizada; y,\r\n\r\nd) Registro de Activos de Información: Los sistemas informáticos y equipos de la infraestructura tecnológica, deben ser registrados en un repositorio, el cual deberá permanecer actualizado.'),
(25, 4, 11, 11, 20, 'Aplicaciones del Negocio.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben implementar controles de seguridad para las aplicaciones del negocio, que contemplen los aspectos siguientes:\r\n\r\na) Protección de las Aplicaciones: Deben utilizar funcionalidades de seguridad de la información alineadas a la infraestructura técnica de seguridad, que permitan el cumplimiento de los requerimientos de confidencialidad, integridad y disponibilidad de la información;\r\n\r\nb) Protección de las Aplicaciones Basadas en Navegación: Deben establecer controles específicos de seguridad cibernética sobre las aplicaciones y servicios transaccionales, tanto internos como externos que apoyen los servicios hacia internet, basados en el navegador y en los servidores en donde se ejecutan; y,\r\n\r\nc) Validación de la Información en las aplicaciones de negocio: Deben incorporar controles de Seguridad Cibernética y de la Información, que protejan la confidencialidad e integridad de la información, cuando sean ingresadas, procesadas o extraídas de la aplicación.'),
(26, 4, 11, 11, 21, 'Políticas de Privacidad de la Información.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben especificar en los contratos con sus clientes, las políticas relacionadas a la privacidad de la información y datos de carácter personal utilizados en sus productos y servicios, así como cualquier modificación a las mismas. Estas políticas deben contener el desglose del uso que la entidad receptora de información dará a cada tipo de información o dato recopilado y deberán ser divulgadas a través de medios físicos o electrónicos.\r\n\r\nPárrafo: En el caso de los contratos vigentes aprobados por la Superintendencia de Bancos, se remitirá únicamente las nuevas cláusulas incluidas en los mismos.'),
(27, 4, 11, 11, 22, 'Términos y Condiciones de Uso.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben mantener actualizados los términos y condiciones de uso previamente aprobados, cubriendo los aspectos de Seguridad Cibernética y de la Información. Asimismo, gestionarán el cumplimiento de dichos términos y condiciones de uso, de conformidad con los requerimientos de Seguridad Cibernética y de la Información de la entidad.'),
(28, 4, 11, 11, 23, 'Trazabilidad de las Conexiones de los Clientes.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben identificar y registrar en un inventario de conexiones, los accesos de los clientes a los servicios de canales electrónicos o digitales. Este acceso de los clientes debe ser protegido mediante mecanismos de control y supervisión.'),
(29, 4, 11, 11, 24, 'Gestión de Accesos de los Colaboradores.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben contemplar dentro de su Programa de Seguridad Cibernética y de la Información, la gestión de los accesos de los colaboradores a los sistemas de información e infraestructuras tecnológicas, considerando los aspectos siguientes:\r\n\r\na) Control de Acceso: Se deben establecer límites y controles para los accesos de los colaboradores a los sistemas de información e infraestructura tecnológica; y,\r\n\r\nb) Autorización a los Colaboradores: Los accesos a los colaboradores sobre los sistemas de información e infraestructura tecnológica, deben ser autorizados previo a su otorgamiento.'),
(30, 4, 11, 11, 25, 'Mecanismos de Control de Acceso.', 'El acceso a los sistemas de información e infraestructura tecnológica se limitará a las personas autorizadas, utilizando mecanismos apropiados de control de acceso contemplados en sus políticas internas y supervisado por el personal técnico de seguridad, contemplando los principios del menor privilegio y separación de funciones.'),
(31, 4, 11, 11, 26, 'Gestión de Sistemas de Información.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben establecer políticas y procedimientos para la gestión de los sistemas de información, considerando los aspectos siguientes:\r\na) Sistemas Informáticos e Infraestructura Tecnológica: Deben ser protegidos mediante controles de seguridad integrados;\r\n\r\nb) Configuración de los Servidores Físicos y Virtuales: Deben estar configurados para evitar cambios o accesos no autorizados, previniendo la interrupción de los servicios como resultado de una sobrecarga del sistema u otros factores;\r\n\r\nc) Sistemas de Almacenamiento de Red: Deben estar protegidos mediante controles de seguridad, procurando la confidencialidad, integridad y disponibilidad de la información que contienen;\r\n\r\nd) Gestión de Cambios: Los cambios en los sistemas de la información e infraestructura tecnológica deben ser probados, revisados y aplicados mediante un proceso definido de gestión de cambios; y,\r\n\r\ne) Copias de Resguardo y su Retención: Las copias de resguardo se deben realizar de forma regular, de acuerdo con un ciclo definido, con un esquema distribuido que incluya medios de resguardo no conectados a la red interna, fuera de línea y en formato digital. A saber:\r\n\r\ni. El resguardo de la información esencial deberá ser conservado de conformidad con el grado de utilidad de la misma para los fines de restauración. Dicha información deberá ser cifrada. El tiempo de retención para la información esencial de tipo transaccional, será de por lo menos 1 (un) año. Para la información esencial de tipo maestro, la entidad deberá resguardar en todo momento, la más actualizada de las versiones disponibles de dicha información; y,\r\n\r\nii. Para las copias de resguardo de las pistas de auditoría, el tiempo de retención será de por lo menos 180 (ciento ochenta) días.'),
(32, 4, 11, 11, 27, 'Infraestructura Técnica de Seguridad.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben implementar plataformas y sistemas que faciliten la aplicabilidad de los controles de seguridad apropiados, contemplando los aspectos siguientes:\r\n\r\na) Arquitectura de Seguridad Cibernética y de la Información: El comité funcional de seguridad cibernética y de la información debe establecer la arquitectura de seguridad cibernética y de la información de la entidad, a fin de proporcionar un marco estándar para la aplicación de los controles;\r\n\r\nb) Gestión de Identidad: Establecer un proceso de gestión de identidad, para proporcionar una administración de perfiles de usuarios eficaz y coherente con la identificación, autenticación y mecanismos de control de acceso;\r\n\r\nc) Sistemas de Información de Infraestructuras Críticas: Los sistemas de información que apoyan las infraestructuras críticas, serán protegidos por políticas integrales de Seguridad Cibernética y de la Información, que incluyan la evaluación de riesgos, la selección de los controles de seguridad, la evidencia de su implementación y su monitoreo;\r\n\r\nd) Soluciones Criptográficas: Utilizar soluciones criptográficas para proteger y preservar la confidencialidad e integridad de la información sensible en tránsito o almacenada, así como el canal de transmisión utilizado, tomando en cuenta lo siguiente:\r\n\r\ni. Gestión de los Algoritmos de Cifrado: La utilización de algoritmos de cifrado debe estar documentada y aprobada por el comité funcional de seguridad cibernética y de la información. Los algoritmos deben contar con respaldo internacional por su garantía a la confidencialidad e integridad de la información y los inseguros u obsoletos deben ser suspendidos o actualizados;\r\nii. Gestión de las Llaves Criptográficas: Las llaves criptográficas deben ser manejadas de manera segura, de acuerdo con los estándares y procedimientos documentados, y deben ser protegidas contra el acceso o destrucción no autorizada; y,\r\niii. Infraestructura de Llaves Públicas (PKI, por sus siglas en inglés): Cuando se utiliza una infraestructura de llave pública, deben ser establecidas por una o más entidades de certificación y autoridades de registro y las llaves deben estar protegidas con los controles de seguridad necesarios.\r\ne) Protección Contra la Fuga de Información: Se establecerán mecanismos de protección contra la fuga de información a los sistemas, infraestructura tecnológica y entornos locales que procesan, almacenan o transmiten información sensible; y,\r\nf) Gestión de los Derechos Digitales (DRM, por sus siglas en inglés): La información sensible o las aplicaciones utilizadas fuera de la infraestructura tecnológica, se protegerán mediante el uso de un sistema de gestión de derechos digitales.'),
(33, 4, 11, 11, 28, 'Gestión de la Red.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben implementar procesos y plataformas para la gestión segura de los componentes en las redes de información, tomando en consideración los aspectos siguientes:\r\n\r\na) Configuración de Dispositivos de Red: Los dispositivos de red deben ser configurados para funcionar de acuerdo con su rol y se establecerán controles de seguridad que eviten cambios no autorizados o incorrectos;\r\n\r\nb) Gestión de la Red Física: Las redes deben ser protegidas por controles físicos de seguridad, con el apoyo de documentación actualizada y el etiquetado de los componentes esenciales. Los puntos de acceso a la red deben estar protegidos por mecanismos de control de acceso;\r\n\r\nc) Conexiones de Redes Externas: Las conexiones de redes externas a los sistemas y redes informáticas deben ser identificadas, verificadas, registradas y aprobadas individualmente por el comité funcional de seguridad cibernética;\r\n\r\nd) Tráfico de Datos a Través de los Firewalls (Cortafuegos): El tráfico de datos entre redes o subredes internas o externas interconectadas, será debidamente transmitido a través de firewalls, con las reglas de seguridad requeridas, previo a la concesión o restricción de acceso;\r\n\r\ne) Mantenimiento Remoto: El mantenimiento remoto de los sistemas y redes críticas debe restringirse al personal debidamente autorizado, confinado a sesiones individuales y sujeto a revisión;\r\n\r\nf) Acceso a Redes Inalámbricas: El acceso desde y hacia redes inalámbricas, será limitado a los usuarios y dispositivos autenticados y autorizados. El canal de transmisión debe ser cifrado para salvaguardar la información sensible en tránsito;\r\n\r\ng) Redes de Voz sobre IP (VoIP, por sus siglas en inglés): Las redes de VoIP deben ser protegidas por una combinación de controles de seguridad, tanto de la red como específicos del protocolo VoIP, para garantizar la disponibilidad de las mismas y proteger la confidencialidad e integridad de la información sensible en tránsito; y,\r\n\r\nh) Telefonía y Conferencia: Las instalaciones de telefonía y conferencia deben protegerse con una combinación de controles de seguridad físicos y lógicos, monitoreo continuo y acceso restringido.'),
(34, 4, 11, 11, 29, 'Conexiones con los Servicios de Entes Reguladores y Supervisores.', 'Las Superintendencias del sistema financiero y los órganos reguladores sub-sectoriales a cuyos regulados alcance este Reglamento, y que mantengan una conexión con los mismos, deben realizar revisiones periódicas a los modelos de conexión previamente establecidos con sus servicios, con el propósito de evaluar los controles de seguridad utilizados en los mismos, para determinar las mejoras necesarias que deben ser implementadas para garantizar la disponibilidad de los servicios.'),
(35, 4, 11, 11, 30, 'Gestión de Vulnerabilidades y Amenazas Tecnológicas.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben establecer un proceso de análisis, monitoreo y evaluación integral de las vulnerabilidades y amenazas tecnológicas a sus sistemas, infraestructuras y procesos tecnológicos, para minimizar la ocurrencia de incidentes y eventos relacionados a la Seguridad Cibernética y de la Información, contemplando los aspectos siguientes:\r\n\r\na) Actualizaciones de Seguridad de Sistemas: Establecer un proceso para el despliegue recurrente de actualizaciones de seguridad del firmware, de los sistemas operativos y de las aplicaciones. En los casos en que la actualización esté a cargo de un proveedor externo y que, por cualquier causa y de manera definitiva, rescinda o descontinúe el servicio de soporte de actualizaciones de seguridad de firmware, sistemas operativos o aplicaciones, la entidad deberá sustituirlo;\r\n\r\nb) Inteligencia contra Amenazas: Desarrollar capacidades de inteligencia contra amenazas mediante la implementación de procesos, plataformas de análisis y recolección de datos, apoyadas por un ciclo de inteligencia;\r\n\r\nc) Protección Contra el Software Malicioso: Se debe implementar una solución tecnológica eficaz para el control y protección de software malicioso en los sistemas de información e Infraestructura Tecnológica. Esta solución estará configurada para recibir actualizaciones periódicas emitidas por el proveedor de la misma;\r\n\r\nd) Registro de Eventos de Seguridad Cibernética y de la Información: Los acontecimientos potencialmente relacionados con incidentes de Seguridad Cibernética y de la Información deben ser registrados, almacenados de forma centralizada, protegidos contra la modificación no autorizada y analizados de manera regular. El tiempo de retención para estos registros no podrá ser menor a 3 (tres) años;\r\n\r\ne) Monitoreo de los Sistemas y la Infraestructura Tecnológica: Los sistemas y la Infraestructura Tecnológica deben ser monitoreados y revisados continuamente para asegurar el rendimiento de los mismos, reducir la ocurrencia de sobrecargas, identificar vulnerabilidades y detectar posibles intrusiones maliciosas;\r\n\r\nf) Prevención y Detección de Intrusos: Implementar soluciones tecnológicas o mecanismos de prevención y detección de intrusos, a fin de proteger los sistemas y la infraestructura tecnológica.'),
(36, 4, 11, 11, 31, 'Gestión de Incidentes de Seguridad Cibernética y de la Información.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben establecer políticas y procedimientos para la gestión de los incidentes de Seguridad Cibernética y de la Información, con el fin de identificar, responder, remediar y documentar de manera efectiva los eventos o cadena de eventos que vulneren dicha seguridad, procurando minimizar su impacto y recuperarse del incidente en el menor plazo posible. A tales fines deben contemplar los aspectos siguientes:\r\n\r\na) Medidas contra Ataques Cibernéticos e Incidentes de Seguridad de la Información: Tomar medidas razonables y efectivas para procurar la protección de la información, los sistemas y la infraestructura tecnológica, frente a los ataques cibernéticos o incidentes relacionados con la seguridad de la información;\r\n\r\nb) Correctivos de Emergencia: Establecer un método eficaz de prueba, revisión y aplicación de correctivos de emergencia a los sistemas de la información e infraestructura tecnológica, de acuerdo con los procedimientos previamente autorizados; y,\r\n\r\nc) Investigaciones Forenses: Definir un proceso para realizar las investigaciones forenses relacionadas con incidentes de seguridad cibernética y de la información u otros eventos que lo requieran.'),
(37, 4, 11, 11, 32, 'Entornos Locales de Operación.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben identificar los entornos locales de operación y establecer procesos de seguridad cibernética para estos ambientes, contemplando los aspectos siguientes:\r\n\r\na) Perfil de Seguridad de Localidad Física: Definir, documentar y actualizar los perfiles de seguridad de sus localidades físicas, los cuales deben contener detalles importantes de seguridad acerca de los colaboradores internos, los procesos, la información, la tecnología utilizada y la ubicación asociados a sus localidades físicas. La finalidad de los perfiles es la de servir de apoyo en la toma de decisiones basadas en el riesgo y relacionadas con la Seguridad Cibernética y de la Información, que involucren dichas localidades;\r\n\r\nb) Coordinación de la Seguridad Local: Tomar medidas para coordinar las actividades de seguridad de la información en las unidades de negocio pertinentes; y,\r\n\r\nc) Equipos Electrónicos y Digitales: Los equipos electrónicos y digitales que procesan, almacenan o transmiten información, deben ser protegidos y localizados en lugares físicamente seguros. El uso de dispositivos electrónicos que permitan el registro o la captación de contenido audiovisual en áreas restringidas debe ser controlado, así como los horarios de acceso a las mismas.'),
(38, 4, 11, 11, 33, 'Aplicaciones de Estaciones de Trabajo.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben establecer procesos para la gestión adecuada de la Seguridad Cibernética y de la Información de las aplicaciones instaladas en las estaciones de trabajo, contemplando los aspectos siguientes:\r\n\r\na) Inventario de las Aplicaciones de Estaciones de Trabajo: Las aplicaciones de estaciones de trabajo deberán estar registradas en un inventario o su equivalente;\r\n\r\nb) Protección de los Archivos con Información Confidencial: Los archivos creados en aplicaciones de estaciones de trabajo, cuyo contenido sea información confidencial, deben ser protegidos mediante la validación de la entrada, aplicando mecanismos de control de acceso;\r\n\r\nc) Protección de las Bases de Datos: Las bases de datos gestionadas con aplicaciones de estaciones de trabajo, deben ser protegidas mediante la validación de la entrada, la aplicación de controles de acceso y la restricción a colaboradores autorizados a las funcionalidades de alto privilegio; y,\r\n\r\nd) Desarrollo de Aplicaciones de Estaciones de Trabajo: Debe ser llevado a cabo según la metodología de desarrollo seguro, adoptada por la entidad.'),
(39, 4, 11, 11, 34, 'Dispositivos de Computación Móvil.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben establecer mecanismos de seguridad para proteger la información intercambiada a través de los dispositivos de computación móvil utilizados por los colaboradores, tomando en consideración los aspectos siguientes:\r\n\r\na) Acceso desde Entornos Remotos: Los dispositivos utilizados por los colaboradores para acceder desde entornos remotos, deben estar sujetos a autorización según los estándares y procedimientos establecidos por el comité funcional de seguridad cibernética y de la información;\r\n\r\nb) Gestión Centralizada de Dispositivos Móviles: Contar con mecanismos para la gestión centralizada de dispositivos móviles y se proveerá a los colaboradores autorizados, de información relevante relacionada a la protección de los dispositivos bajo su custodia;\r\n\r\nc) Protección de la Información en los Dispositivos Móviles: Los dispositivos móviles deben ser protegidos contra la divulgación no autorizada de información, pérdida o hurto, mediante controles de acceso y cifrado de los mismos;\r\n\r\nd) Conectividad de los Dispositivos Móviles: Los dispositivos móviles deben estar provistos de medios seguros de conexión a otros dispositivos y redes;\r\n\r\ne) Dispositivos Portátiles de Almacenamiento: El uso de dispositivos portátiles de almacenamiento, debe ser objeto de aprobación con acceso restringido. El almacenamiento de información en este tipo de dispositivos, debe ser de forma cifrada; y,\r\n\r\nf) Dispositivos Personales: El acceso a la red a través de dispositivos de computación móvil propiedad de los colaboradores, debe contar con la debida autorización y la implementación de controles técnicos, que contemplen los requerimientos de Seguridad Cibernética y de la Información.'),
(40, 4, 11, 11, 35, 'Comunicaciones Electrónicas:', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben asegurar las comunicaciones electrónicas, mediante controles y políticas de Seguridad Cibernética y de la Información, tomando en consideración los aspectos siguientes:\r\n\r\na) Correo Electrónico: Los sistemas de correo electrónico deben estar protegidos por una combinación de procesos, concienciación y controles técnicos de Seguridad Cibernética y de la Información; y,\r\n\r\nb) Mensajería Instantánea: Los servicios de mensajería instantánea deben ser protegidos mediante el establecimiento de un proceso de gestión, la implementación de los controles y la configuración de los elementos de Seguridad Cibernética y de la Información;\r\n\r\nc) Plataformas de Colaboración: Las plataformas de colaboración deben estar protegidas por políticas de gestión de configuración, controles de despliegue de aplicación y la realización de ajustes de seguridad en cada plataforma, asegurando su disponibilidad cuando se requieran y la protección de las informaciones en tránsito; y,\r\n\r\nd) Servicios de Comunicación de voz: Los servicios de comunicación de voz deben ser aprobados y protegidos por una combinación de controles tecnológicos, los cuales deben monitorease regularmente y estar respaldados por restricciones en los accesos.'),
(41, 4, 11, 11, 36, 'Gestión de Proveedores Externos de Productos o Servicios Tecnológicos.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, que contraigan obligaciones contractuales con proveedores externos de productos o servicios tecnológicos, deben asegurar la integración de los requerimientos de Seguridad Cibernética y de la Información, tomando en consideración los aspectos siguientes:\r\n\r\na) Tercerización: Establecer un proceso para regir la selección y gestión de los proveedores externos, apoyado en contratos que especifiquen los requisitos de Seguridad Cibernética y de la Información;\r\n\r\nb) Requisitos de Seguridad a los Proveedores Externos: El cumplimiento de los requisitos de Seguridad Cibernética y de la Información, debe considerarse y revisarse de manera periódica durante la relación con los proveedores externos, contemplando el análisis y la gestión adecuada de los riesgos;\r\n\r\nc) Adquisición o Arrendamiento de Equipos y Sistemas Tecnológicos: El proceso de adquisición o arrendamiento de equipos y sistemas tecnológicos, debe basarse en guías de referencia para la selección y aprobación de proveedores de equipos, aplicaciones y servicios, y prever los requerimientos técnicos de seguridad aprobados por el comité funcional de seguridad cibernética y de la información, asegurando que estos brinden la funcionalidad requerida y no comprometan la seguridad de la información sensible de la entidad durante su ciclo de vida; y,\r\n\r\nd) Contratación de Servicios de Computación en la Nube: Se debe documentar una política para el uso y contratación de servicios de computación en la nube, incluyendo el hospedaje de servicios web, que contemple el desarrollo de un análisis de riesgos de Seguridad Cibernética y de la Información de los servicios contratados, para determinar el uso de los mismos por parte de los colaboradores, la integridad de la información almacenada, así como los mecanismos de protección de la misma. Esta política debe ser comunicada a todos los colaboradores que puedan hacer uso de los mismos y los requerimientos de seguridad cibernética deben estar contenidos en dicha política.'),
(42, 4, 11, 11, 37, 'Gestión de Desarrollo de Sistemas.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, que mantengan en su estructura orgánica un área de desarrollo de sistemas, deben establecer un proceso de gestión de desarrollo de sistemas, el cual contemplará las disposiciones siguientes:\r\n\r\na) Metodología de Desarrollo de Sistemas: Las actividades de desarrollo de sistemas deben llevarse a cabo de acuerdo con una metodología de desarrollo documentada y apegada a las mejores prácticas internacionales;\r\n\r\nb) Entornos de Desarrollo de Sistemas: Las actividades de desarrollo de sistemas se deben realizar en los entornos de desarrollo especializados, los cuales deben estar separados de los ambientes de producción y preproducción, y protegidos contra el acceso no autorizado. La data de entornos productivos no debe ser utilizada o almacenada en los entornos de desarrollo. Deben establecerse mecanismos para asegurar la privacidad y protección de los datos de carácter personal en los ambientes de preproducción (aseguramiento de la calidad) y producción;\r\n\r\nc) Aseguramiento de la Calidad: El desarrollo de los sistemas debe realizarse siguiendo normas y pruebas de calidad, que procuren que los controles y requisitos de Seguridad Cibernética y de la Información acordados, sean implementados durante el ciclo de desarrollo del mismo; y,\r\n\r\nd) Interfaces Programables de Aplicaciones (API, por sus siglas en inglés): Los sistemas y aplicaciones que permitan la extensibilidad de funciones a través de interfaces de aplicaciones programables, deberán contar con controles de Seguridad Cibernética y de la Información que regulen la interacción con otros sistemas y aplicaciones, tanto internos como de terceros. Del mismo modo, las aplicaciones desarrolladas que interactúen con estas interfaces de aplicaciones programables, deberán cumplir con los requerimientos de seguridad establecidos por la entidad.');
INSERT INTO `articulo` (`idarticulo`, `idley`, `idtitulo`, `idcapitulo`, `numero`, `nombre`, `descripcion`) VALUES
(43, 4, 11, 11, 38, 'Ciclo de Vida del Desarrollo de Sistemas y Aplicaciones.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos que mantengan en su estructura orgánica un área de desarrollo de sistemas, deben adoptar un ciclo de vida para el desarrollo seguro de sus sistemas y aplicaciones, de acuerdo a las disposiciones siguientes:\r\n\r\na) Especificaciones de los Requerimientos: Los requerimientos del negocio, incluidos los de Seguridad Cibernética y de la Información, deben ser contemplados durante la fase de especificación de requerimientos;\r\n\r\nb) Diseño de Sistemas y aplicaciones: Los requisitos de Seguridad Cibernética y de la Información para los sistemas que se encuentran en el ciclo de desarrollo, deben ser considerados en el diseño de dichos sistemas y aplicaciones, a fin de minimizar las vulnerabilidades;\r\n\r\nc) Compilación de Sistemas y aplicaciones: Las actividades de compilación de los sistemas y aplicaciones, incluyendo la codificación y personalización de paquetes, deben llevarse a cabo de conformidad con las mejores prácticas de la industria, realizadas por el personal especializado en el desarrollo de sistemas y aplicaciones. Las actividades de compilación deben ser inspeccionadas para identificar modificaciones o cambios no autorizados;\r\n\r\nd) Prueba de Sistemas y aplicaciones: Los sistemas y aplicaciones en desarrollo deben ser probados en una zona dedicada de pruebas que simule el entorno de producción, con la debida atención a la data de carácter personal utilizada, antes de que el sistema o aplicación sea colocado en el ambiente de producción;\r\n\r\ne) Pruebas de Seguridad: Los sistemas y aplicaciones en desarrollo deben ser sometidos a pruebas de Seguridad Cibernética y de la Información en las fases requeridas dentro del ciclo de desarrollo, utilizando herramientas para la detección de vulnerabilidades, pruebas de penetración y pruebas de control de acceso, previo a su colocación en los ambientes de producción;\r\n\r\nf) Proceso de Instalación: Los nuevos sistemas y aplicaciones se deben instalar en el entorno de producción, de acuerdo con un proceso documentado que contemple los requerimientos de Seguridad Cibernética y de la Información; y,\r\n\r\ng) Revisiones luego de las Implementaciones: luego de la implementación, se deben realizar revisiones periódicas de acuerdo con procesos documentados, incluyendo la cobertura de la Seguridad Cibernética y de la Información.'),
(44, 4, 11, 11, 39, 'Seguridad Física y del Entorno.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben definir los mecanismos que provean las condiciones de seguridad física y del entorno adecuado de las instalaciones críticas.\r\n\r\nPárrafo: Las instalaciones críticas, incluyendo lugares que albergan los sistemas informáticos, tales como los centros de datos, redes, equipos de telecomunicaciones, material físico sensible y otros activos importantes, deben ser protegidos contra accidentes, ataques y el acceso físico no autorizado; contra los cortes o fluctuaciones de energía, así como estar protegidos contra incendios, inundaciones y otras amenazas naturales.'),
(45, 4, 11, 11, 40, 'Continuidad de las Operaciones Tecnológicas.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben definir los procesos que provean las capacidades necesarias que procuren garantizar la continuidad de las operaciones tecnológicas ante incidentes de Seguridad Cibernética y de la Información que puedan afectar significativamente las operaciones normales del negocio, contemplando las disposiciones siguientes:\r\n\r\na) Esquema de Continuidad de las Operaciones Tecnológicas: Se debe establecer un esquema de continuidad que incluya el desarrollo e implementación de sistemas e infraestructuras tecnológicas flexibles, creando una capacidad de gestión de crisis, así como la coordinación y el mantenimiento de los planes de continuidad y contingencia de las operaciones tecnológicas;\r\n\r\nb) Resiliencia: Las aplicaciones críticas del negocio y la infraestructura tecnológica subyacente, se deben apoyar en equipos y sistemas robustos y confiables, con el apoyo de instalaciones alternativas o redundantes;\r\n\r\nc) Gestión de Crisis: Establecer un proceso de gestión de crisis, con el soporte de una unidad de apoyo, que detalle las acciones que se deben tomar en caso de la ocurrencia de un incidente de Seguridad Cibernética y de la Información, que afecten significantemente las operaciones normales del negocio;\r\n\r\nd) Planes de Continuidad y de Contingencia de las Operaciones Tecnológicas: Los planes de continuidad de las operaciones tecnológicas deben ser desarrollados y documentados para apoyar los procesos críticos del negocio en la entidad. Para las operaciones tecnológicas que soportan los procesos no críticos, será suficiente con el desarrollo de un plan de contingencia;\r\n\r\ne) Planes de Recuperación ante Desastres: Se deben establecer y documentar planes de recuperación ante desastres para las operaciones tecnológicas que soportan los procesos críticos del negocio y garantizar la disponibilidad de los mismos cuando sea necesario; y,\r\n\r\nf) Pruebas de Estrés: Las pruebas de estrés relacionadas a la continuidad de las operaciones tecnológicas deben ser ejecutadas en intervalos de períodos no mayores a 1 (un) año, sin perjuicio del incremento de la frecuencia de las pruebas bajo circunstancias especiales o a requerimiento de los entes reguladores y supervisores. Debe existir un registro o constancia de la calidad y los resultados de las mismas.'),
(46, 4, 11, 12, 41, 'Auditorías Internas.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben establecer procesos de auditorías internas para garantizar la supervisión efectiva del Programa de Seguridad Cibernética y de la Información, contemplando los aspectos siguientes:\r\n\r\na) Gestión de las Auditorías Internas de Seguridad Cibernética y de la Información: El estado de Seguridad Cibernética y de la Información en los sistemas de la información y la infraestructura tecnológica, en adición a los procesos de evaluación a que hace referencia el Artículo 46 de este Reglamento, debe ser objeto de auditorías exhaustivas y periódicas, llevadas a cabo por la unidad interna de auditoría o a través de una firma de auditores externos, o bien, por un auditor externo que cuente con las competencias y certificaciones requeridas para el desarrollo de las mismas, según se defina en el instructivo correspondiente, registrados en la Superintendencia de Bancos y en cumplimiento con el proceso de auditoría interna de la entidad; y,\r\n\r\nb) Informes de Resultados de las Auditorías Internas de Seguridad Cibernética y de la Información: Los resultados de las auditorías internas de Seguridad Cibernética y de la Información de los sistemas informáticos y la infraestructura tecnológica, deben contener la documentación y notificación a las partes interesadas de sus conclusiones y recomendaciones.'),
(47, 4, 11, 12, 42, 'Desempeño de la Seguridad.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben establecer mecanismos que procuren asegurar un desempeño óptimo de la gestión de la Seguridad Cibernética y de la Información, contemplando los aspectos siguientes:\r\n\r\na) Monitoreo de la Seguridad: El Oficial de Seguridad Cibernética y de la Información debe monitorear permanentemente el estado de Seguridad Cibernética y de la Información; y,\r\n\r\nb) Informes sobre la Seguridad: El Oficial de Seguridad Cibernética y de la Información debe elaborar informes periódicos y según necesidad, relativos a los riesgos de la Seguridad Cibernética y de la Información y los mismos serán presentados al comité funcional de seguridad cibernética y de la información en los tiempos establecidos por el mismo.'),
(48, 4, 11, 12, 43, 'Cumplimiento del Monitoreo de la Seguridad.', 'Se debe establecer un procedimiento de gestión de cumplimiento de la Seguridad Cibernética y de la Información derivados de los lineamientos reglamentarios, jurídicos y de obligaciones contractuales.'),
(49, 4, 11, 13, 44, 'Estándares Internacionales.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, que de manera contractual accedan a los servicios prestados por entidades internacionales que habilitan la provisión de sus productos y servicios dentro de dicho sistema, deben cumplir, en cada caso en que aplique, con los objetivos siguientes:\r\n\r\na) Proteger los datos del cliente y facilitar la adopción de medidas de seguridad uniformes, apoyados en la Norma de Seguridad de Datos para la Industria de Tarjeta de Pago (PCI-DSS, por sus siglas en inglés);\r\n\r\nb) Asegurar la protección en la administración, procesamiento y transmisión, tanto en línea como fuera de línea, del Número de Identificación Personal (PIN, por sus siglas en inglés) del cliente, apoyados en los requerimientos de seguridad del PIN del grupo de estándares PCI – PTS;\r\n\r\nc) Aplicar los requerimientos de seguridad y los procedimientos de evaluación de los proveedores de sistemas de aplicaciones de pago, apoyados en la Norma de Seguridad para las Aplicaciones de Pago (PA-DSS, por sus siglas en inglés); y,\r\n\r\nd) Reforzar los controles de seguridad de los ambientes locales e infraestructuras relacionadas que interactúen con la red de SWIFT, apoyado en el Marco de Controles de Seguridad del Cliente (SWIFT – CSCF, por sus siglas en inglés).'),
(50, 4, 11, 13, 45, 'Estándares Facilitadores del Cumplimiento de la Norma PCI-DSS.', 'A fin de facilitar el cumplimiento de la Norma PCI-DSS, las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y las entidades de apoyo y servicios conexos a quienes aplique a la adopción de la misma, debe cumplir con los objetivos siguientes:\r\n\r\na) Fortalecer la protección de los datos transmitidos desde el Punto de Interacción (PDI) hasta su destino final, apoyados en los requerimientos de soluciones para el cifrado punto a punto (P2PE) del estándar PCI – P2PE;\r\n\r\nb) Reforzar los controles de seguridad física y lógica, en los procesos de producción y distribución de las tarjetas bancarias, apoyados en los requerimientos de seguridad para la producción y aprovisionamiento de tarjetas bancarias; y,\r\n\r\nc) Robustecer los controles de seguridad para salvaguardar la integridad del entorno de datos del Token, tanto estáticos como dinámicos, apoyados en los estándares de seguridad para proveedores de servicios de Token (PCI – TSP).\r\n\r\nPárrafo: En caso de que las entidades emisoras de tarjetas bancarias hayan tercerizado los servicios de producción de las mismas y los servicios de token estáticos y dinámicos, deben verificar el cumplimiento de los requerimientos que les apliquen a los citados terceros. Para los servicios de producción de tarjetas bancarias deberá tomarse en consideración lo establecido en los contratos de servicio suscritos con las marcas de tarjetas bancarias.'),
(51, 4, 11, 14, 46, 'Informes de Cumplimiento.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos que estén interconectadas con el SIPARD, deben cumplir con un procedimiento de autoevaluación a través de herramientas digitales, para la remisión de la información requerida, en los plazos y en la forma en que se determine mediante Instructivo. Las Superintendencias del sistema financiero, en coordinación con el Banco Central en su condición de Administrador del SIPARD, y los órganos reguladores sub-sectoriales a cuyos regulados alcance este Reglamento, implementarán dichas herramientas para la autoevaluación.'),
(52, 4, 11, 14, 47, 'Requerimientos Adicionales de Información.', 'Las Superintendencias del sistema financiero y los órganos reguladores sub-sectoriales a cuyos regulados alcance este Reglamento, podrán requerir en cualquier momento, información adicional o complementaria a las entidades de intermediación financiera y las entidades públicas de intermediación financiera, respecto a la gestión del Programa de Seguridad Cibernética y de la Información. Del mismo modo, el Banco Central podrá requerir, en cualquier momento, información adicional o complementaria a los Administradores y Participantes del SIPARD y de los Sistemas de Pago y Liquidación de Valores que lo componen, a las Entidades de apoyo y servicios conexos, respecto a la gestión del Programa de Seguridad Cibernética y de la Información.'),
(53, 4, 11, 14, 48, 'Verificación de los Entes Reguladores y Supervisores.', 'Las superintendencias del sistema financiero y los órganos reguladores sub-sectoriales a cuyos regulados alcance este Reglamento, así como el Banco Central, en su calidad de Administrador del SIPARD, podrán verificar la idoneidad del cumplimiento del Programa de Seguridad Cibernética y de la Información de sus entes regulados, así como de la evaluación independiente de la eficacia de dicha gestión.'),
(54, 4, 12, 15, 49, 'Del Consejo Sectorial.', 'Se crea el Consejo Sectorial para la Respuesta a Incidentes de Seguridad Cibernética del sector financiero y estará integrado de la manera siguiente:\r\n\r\nMiembros permanentes con Voz y Voto:\r\na) El Gobernador del Banco Central, quien lo Presidirá;\r\nb) El Superintendente de Bancos;\r\nc) El Superintendente del Mercado de Valores;\r\nd) El Contralor del Banco Central;\r\ne) El Subgerente de Sistemas e Innovación Tecnológica del Banco Central;\r\nf) El Presidente de la Asociación de Bancos Comerciales de la República Dominicana, Inc. (ABA);\r\ng) El Presidente de la Liga de Asociaciones de Ahorros y Préstamos Dominicana (LIDAAPI);\r\nh) El Presidente de la Asociación de Bancos de Ahorro y Crédito y Corporaciones de Crédito, Inc. (ABANCORD); y,\r\ni) El Director del Equipo de Respuesta a Incidentes de Seguridad Cibernética (CSIRT por sus siglas en inglés) del sector financiero, habilitado de conformidad con este Reglamento, quien fungirá como Secretario, pero sólo con voz.\r\n\r\nInvitados permanentes con Voz:\r\na) El Director de Seguridad Operativa del Banco Central;\r\nb) El Director del Departamento de Sistemas y Tecnología del Banco Central;\r\nc) El Director del Departamento del Sistema de Pagos del Banco Central;\r\nd) El Director del Departamento de Seguridad Interna del Banco Central;\r\ne) El Responsable de la Oficina de Gestión de Riesgos y Continuidad del Banco Central;\r\nf) El Director del Departamento de Tecnología y Operaciones de la Superintendencia de Bancos;\r\ng) El Director de Riesgos y Estudios de la Superintendencia de Bancos;\r\nh) Un representante de alta jerarquía de la Superintendencia del Mercado de Valores; y,\r\ni) Un representante de alta jerarquía de la Superintendencia de Pensiones.\r\n\r\nPárrafo I: Los miembros permanentes de este Consejo Sectorial podrán delegar su representación en un funcionario de alta jerarquía.\r\n\r\nPárrafo II: Los invitados permanentes de este Consejo Sectorial no podrán delegar su representación.\r\n\r\nPárrafo III: El Consejo Sectorial podrá invitar otras entidades relacionadas al sector financiero a reuniones puntuales por requerimiento de 3 (tres) o más de sus miembros.'),
(55, 4, 12, 15, 50, 'Facultades.', 'El Consejo Sectorial tendrá de manera enunciativa, pero no limitativa, las facultades siguientes:\r\n\r\na) Definir las prioridades y lineamientos para la coordinación del Equipo de Respuesta a Incidentes de Seguridad Cibernética (CSIRT, por sus siglas en inglés;\r\n\r\nb) Dar seguimiento a las actividades del Equipo de Respuesta a Incidentes de Seguridad Cibernética (CSIRT, por sus siglas en inglés) y al funcionamiento de sus programas;\r\n\r\nc) Coordinar los esfuerzos de cooperación entre las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, para la prevención, detección, manejo y recopilación de información sobre incidentes de seguridad cibernética;\r\n\r\nd) Realizar las recomendaciones de lugar para la consecución de los objetivos estratégicos del Equipo de Respuesta a Incidentes de Seguridad Cibernética (CSIRT, por sus siglas en inglés);\r\n\r\ne) Definir el marco de cooperación y comunicación del Equipo de Respuesta a Incidentes de Seguridad Cibernética (CSIRT, por sus siglas en inglés) con las áreas funcionales de seguridad cibernética de las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y las entidades de apoyo y servicios conexos;\r\n\r\nf) Definir el marco de cooperación y comunicación con otras comisiones de similar naturaleza y con aquellas definidas por Ley;\r\n\r\ng) Definir los protocolos de comunicación hacia los demás sectores económicos y sociales de la República Dominicana; y,\r\n\r\nh) Cualquier otra facultad atribuida por la Junta Monetaria.'),
(56, 4, 12, 15, 51, 'Funcionamiento.', 'El Consejo Sectorial deberá reunirse de manera ordinaria previa convocatoria de su Presidente, quien establecerá el orden del día y sesionará válidamente con la presencia de al menos de 4 (cuatro) de sus miembros permanentes y el secretario de dicho Consejo, con una frecuencia de por lo menos 1 (una) vez por trimestre. El Presidente, podrá convocar extraordinariamente a tantas sesiones de trabajo como sean necesarias.'),
(57, 4, 12, 16, 52, 'Creación del Mecanismo.', 'Se crea el Equipo de Respuesta a Incidentes de Seguridad Cibernética para el Sector Financiero (CSIRT, por sus siglas en inglés), bajo la dependencia administrativa del Banco Central y funcional del Consejo Sectorial, con la finalidad de definir acciones inmediatas para la prevención, detección, contención, erradicación y recuperación frente a incidentes de seguridad cibernética que afecten las entidades definidas en el objeto y ámbito de este Reglamento;\r\n\r\nPárrafo: El presupuesto requerido, así como las modalidades de ejecución del mismo, para la puesta en funcionamiento y mantenimiento de las operaciones del Equipo de Respuesta a Incidentes de Seguridad Cibernética (CSIRT, por sus siglas en inglés), será determinado por la Junta Monetaria.'),
(58, 4, 12, 16, 53, 'Responsabilidades.', 'El Equipo de Respuesta a Incidentes de Seguridad Cibernética (CSIRT, por sus siglas en inglés) debe cumplir con los deberes y responsabilidades que le sean otorgadas por el Consejo Sectorial.'),
(59, 4, 12, 16, 54, 'Estructura.', 'El Equipo de Respuesta a Incidentes de Seguridad Cibernética (CSIRT, por sus siglas en inglés) debe contar con una estructura orgánica que facilite el cumplimiento de sus deberes y responsabilidades.'),
(60, 4, 12, 16, 55, 'Dirección.', 'El Equipo de Respuesta a Incidentes de Seguridad Cibernética (CSIRT, por sus siglas en inglés), estará dirigido por un profesional designado por el Banco Central, en virtud de sus competencias administrativas y capacidad requerida para la dirección de equipos de respuesta de esta naturaleza.'),
(61, 4, 12, 16, 56, 'Instalaciones.', 'El Equipo de Respuesta a Incidentes de Seguridad Cibernética (CSIRT, por sus siglas en inglés), operará en un lugar aislado, asegurado y sus sistemas de información e infraestructura tecnológica, deben estar implementados tomando en consideración la protección de la información sensible recibida y almacenada en sus sistemas de información. Asimismo, deberá contar con controles de seguridad físicos y lógicos de manera permanente.\r\n\r\nPárrafo I: Las instalaciones de dicho Equipo estarán en un área restringida con el fin de evitar el acceso no autorizado a los recursos y a la información.\r\n\r\nPárrafo II: Los servidores, los equipos de comunicaciones, los dispositivos de seguridad lógica y los repositorios de datos, deben permanecer en las instalaciones del Equipo de Respuesta a Incidentes de Seguridad Cibernética (CSIRT, por sus siglas en inglés) o en un centro de datos autorizado por el Consejo Sectorial, donde el acceso físico y lógico se regirá por un estricto control de acceso, según lo definido en las políticas de acceso a ser elaboradas para esos fines.'),
(62, 4, 12, 16, 57, 'Definición de Políticas.', 'El Equipo de Respuesta a Incidentes de Seguridad Cibernética (CSIRT, por sus siglas en inglés) debe contar con políticas que deben ser seguidas por su personal en la realización de sus operaciones acorde a los lineamientos definidos por este Reglamento y por las disposiciones del Consejo Sectorial.'),
(63, 4, 12, 16, 58, 'Establecimiento de los Servicios.', 'El Equipo de Respuesta a Incidentes de Seguridad Cibernética (CSIRT, por sus siglas en inglés), debe establecer servicios de seguridad cibernética, a fin de dar apoyo a las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, en sus procesos de respuesta a incidentes de seguridad cibernética.'),
(64, 4, 13, 17, 59, 'Sanciones.', 'Las entidades de intermediación financiera y las entidades públicas de intermediación financiera que infrinjan cualesquiera de las disposiciones contenidas en este Reglamento y en los instructivos que fueren creados para su implementación, serán pasibles de la aplicación de las sanciones establecidas en la Ley Monetaria y Financiera y en el Reglamento de Sanciones.'),
(65, 4, 13, 17, 60, 'Medidas Precautorias.', 'Cuando los administradores y participantes del SIPARD previstos en este Reglamento, así como las entidades de apoyo y servicios conexos que mantengan una interconexión o intercambio de información con el SIPARD, y sus administradores y participantes, incumplan alguna de las disposiciones contenidas en este Reglamento y en los instructivos que fueren creados para su implementación, el Banco Central podrá suspender temporalmente su participación en el SIPARD, como medida precautoria y para minimizar el riesgo sistémico. De verificarse el incumplimiento continuo de las disposiciones enunciadas, podrá ser gestionado en coordinación con el organismo regulador correspondiente, la exclusión definitiva del Sistema de Pagos y Liquidación de Valores.'),
(66, 4, 13, 18, 61, 'Elaboración de Instructivos y Circulares.', 'El Banco Central y la Superintendencia de Bancos, deberán elaborar los instructivos y circulares con los lineamientos que consideren necesarios para la aplicación de este Reglamento.'),
(67, 4, 13, 18, 62, 'Plazo de Adecuación.', 'Las entidades de intermediación financiera, los administradores y participantes del SIPARD, las entidades públicas de intermediación financiera y, las entidades de apoyo y servicios conexos, deben ajustarse a las disposiciones contenidas en este Reglamento en el plazo de 1 (un) año contado a partir de la fecha de entrada en vigencia de este Reglamento.\'\r\n2. Esta Resolución deberá ser publicada en uno o más diarios de amplia circulación nacional, en virtud de las disposiciones del literal g) del Artículo 4 de la Ley No.183-02 Monetaria y Financiera, de fecha 21 de noviembre del 2002.”');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulo`
--

CREATE TABLE `capitulo` (
  `idcapitulo` int(11) NOT NULL,
  `idley` int(11) NOT NULL,
  `idtitulo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `capitulo`
--

INSERT INTO `capitulo` (`idcapitulo`, `idley`, `idtitulo`, `descripcion`) VALUES
(1, 1, 1, 'Capitulo Único'),
(2, 1, 1, 'Capitulo Prueba'),
(3, 3, 8, 'Agricola'),
(4, 1, 2, 'pureba'),
(5, 1, 3, 'pruebas'),
(6, 4, 10, 'CAPÍTULO I OBJETO, ALCANCE, ÁMBITO DE APLICACIÓN Y PRINCIPIOS RECTORES'),
(7, 4, 10, 'CAPÍTULO II DEFINICIONES'),
(9, 4, 10, 'CAPÍTULO III MARCO DE TRABAJO Y ESTRUCTURA DE LA GOBERNANZA PARA EL PROGRAMA DE SEGURIDAD CIBERNÉTICA Y DE LA INFORMACIÓN'),
(10, 4, 11, 'CAPÍTULO I GESTIÓN DEL RIESGO TECNOLÓGICO'),
(11, 4, 11, 'CAPÍTULO II MARCO DE CONTROL DE SEGURIDAD CIBERNÉTICA Y DE LA INFORMACIÓN'),
(12, 4, 11, 'CAPÍTULO III MONITOREO Y EVALUACIÓN'),
(13, 4, 11, 'CAPÍTULO IV ESTÁNDARES INTERNACIONALES'),
(14, 4, 11, 'CAPÍTULO V INFORMES DE CUMPLIMIENTO'),
(15, 4, 12, 'CAPÍTULO I GOBERNANZA'),
(16, 4, 12, 'CAPÍTULO II DEL MECANISMO SECTORIAL DE RESPUESTA A INCIDENTES DE SEGURIDAD CIBERNÉTICA'),
(17, 4, 13, 'CAPÍTULO I RÉGIMEN SANCIONATORIO Y MEDIDAS PRECAUTORIAS'),
(18, 4, 13, 'CAPÍTULO II OTRAS DISPOSICIONES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE `evaluacion` (
  `idevaluacion` int(11) NOT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `idley` int(11) NOT NULL,
  `idtitulo` int(11) NOT NULL,
  `idcapitulo` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `idinstitucion` int(11) NOT NULL,
  `marca` tinyint(4) DEFAULT NULL,
  `observacion` varchar(300) DEFAULT NULL,
  `nombredocumento1` varchar(200) NOT NULL,
  `nombredocumento2` varchar(200) NOT NULL,
  `nombredocumento3` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`idevaluacion`, `idusuario`, `idley`, `idtitulo`, `idcapitulo`, `idarticulo`, `idinstitucion`, `marca`, `observacion`, `nombredocumento1`, `nombredocumento2`, `nombredocumento3`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 'Pruebas', '11111Grupo 4 RD v2.pptx', '11111Grupo No.4.jpg', ''),
(4, 1, 1, 1, 1, 2, 2, 1, '', '', '', ''),
(5, 1, 1, 1, 1, 1, 2, 2, '', '', '', ''),
(6, 1, 4, 10, 6, 6, 1, 1, 'Se cumple el 100% con lo requerido en el articulo', '141066Reglamento_seguridad_cibernetica_de_la_informacion RD.', '', ''),
(7, 1, 4, 10, 6, 7, 1, 1, 'Se cumple el 100% con lo requerido en el articulo', '', '', ''),
(8, 1, 4, 10, 6, 8, 1, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(9, 1, 4, 10, 6, 9, 1, 3, 'No cumple con ninguno de los requisitos del articulo, se sugiere mejorar los procesos', '', '', ''),
(10, 1, 1, 1, 1, 2, 1, 1, '', '', '', ''),
(11, 1, 1, 1, 1, 4, 1, 1, '', '', '', ''),
(12, 1, 1, 2, 4, 5, 1, 1, '', '', '', ''),
(13, 1, 4, 10, 6, 6, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '341066Objeto.pdf', '341066Objeto 2.pdf', ''),
(14, 1, 4, 10, 6, 7, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '341067Alcance.pdf', '', ''),
(15, 1, 4, 10, 6, 8, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '341068Ambito de aplicacion.pdf', '341068Ambito de aplicacion 2.pdf', ''),
(16, 1, 4, 10, 6, 9, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '341069Principios rectores.pdf', '', ''),
(17, 1, 4, 10, 7, 10, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '3410710Definiciones.pdf', '', ''),
(18, 1, 4, 10, 9, 11, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(19, 1, 4, 10, 9, 12, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(20, 1, 4, 10, 9, 13, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '3410913Aprobacion del programa de seguridad cibernetica y de la informacion.pdf', '', ''),
(21, 1, 4, 10, 9, 14, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(22, 1, 4, 10, 9, 15, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '3410915Oficial de seguridad cibernetica y de la informacion.pdf', '', ''),
(23, 1, 4, 10, 9, 16, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(24, 1, 4, 10, 9, 17, 3, 3, 'No cumple con ninguno de los requisitos del articulo, se sugiere mejorar los procesos', '', '', ''),
(25, 1, 4, 11, 10, 18, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111018Gestion de riesgos tecnologicos.pdf', '', ''),
(26, 1, 4, 11, 10, 19, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111019Gestion de riesgos tecnologicos en las entidades interconectadas.pdf', '', ''),
(27, 1, 4, 11, 10, 20, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(28, 1, 4, 11, 11, 21, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111121Politica de seguridad cibernetica y de la información.pdf', '', ''),
(29, 1, 4, 11, 11, 22, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(30, 1, 4, 11, 11, 23, 3, 3, 'No cumple con ninguno de los requisitos del articulo, se sugiere mejorar los procesos', '', '', ''),
(31, 1, 4, 11, 11, 24, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111124Gestión de activos de información.pdf', '34111124Gestión de activos de información 2.pdf', ''),
(32, 1, 4, 11, 11, 25, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111125Aplicaciones del negocio.pdf', '34111125Aplicaciones del negocio 2.pdf', ''),
(33, 1, 4, 11, 11, 26, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(34, 1, 4, 11, 11, 28, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(35, 1, 4, 11, 11, 29, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111129Gestion de accesos a los colaboradores.pdf', '', ''),
(36, 1, 4, 11, 11, 30, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111130Mecanismos de control de acceso .pdf', '', ''),
(37, 1, 4, 11, 11, 31, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111131Gestion de sistemas de información.pdf', '', ''),
(38, 1, 4, 11, 11, 32, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(39, 1, 4, 11, 11, 33, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111133Gestion de la red.pdf', '', ''),
(40, 1, 4, 11, 11, 34, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(41, 1, 4, 11, 11, 36, 3, 3, 'No cumple con ninguno de los requisitos del articulo, se sugiere mejorar los procesos', '', '', ''),
(42, 1, 4, 11, 11, 37, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(43, 1, 4, 11, 11, 38, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111138Aplicaciones de estaciones de trabajo.pdf', '', ''),
(44, 1, 4, 11, 11, 39, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111139Dispositivos de computacion movil.pdf', '', ''),
(45, 1, 4, 11, 11, 40, 3, 3, 'No cumple con ninguno de los requisitos del articulo, se sugiere mejorar los procesos', '', '', ''),
(46, 1, 4, 11, 11, 41, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111141Gestion de proveedores externos de productos o servicios tecnologicos.pdf', '', ''),
(47, 1, 4, 11, 11, 42, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(48, 1, 4, 11, 11, 44, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111144Seguridad fisica y del entorno.pdf', '', ''),
(49, 1, 4, 11, 11, 45, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111145Continuidad de las operaciones tecnologicas.pdf', '', ''),
(50, 1, 4, 11, 12, 47, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(51, 1, 4, 11, 12, 48, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(52, 1, 4, 11, 14, 51, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', ''),
(53, 1, 4, 11, 14, 52, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111452Requerimientos adicionales de información.pdf', '', ''),
(54, 1, 4, 11, 14, 53, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34111453Verificación de los entes reguladores y supervisores.pdf', '', ''),
(55, 1, 4, 12, 16, 57, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34121657Creación del mecanismo.pdf', '', ''),
(56, 1, 4, 12, 16, 58, 3, 1, 'Se cumple el 100% con lo requerido en el articulo', '34121658Responsabilidades.pdf', '', ''),
(57, 1, 4, 12, 16, 59, 3, 2, 'No cumple al 100% con lo requerido en el articulo', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion`
--

CREATE TABLE `institucion` (
  `idinstitucion` int(11) NOT NULL,
  `descripcion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `institucion`
--

INSERT INTO `institucion` (`idinstitucion`, `descripcion`) VALUES
(1, 'Superintendencia de Bancos'),
(2, 'Banco Agromercantil'),
(3, 'Asociación Peravia de Ahorros y Créditos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ley`
--

CREATE TABLE `ley` (
  `idley` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ley`
--

INSERT INTO `ley` (`idley`, `descripcion`) VALUES
(1, 'Constitucion Politica de la Republica de Guatemala'),
(2, 'Codigo Penal'),
(3, 'Codigo de Trabajo'),
(4, 'REGLAMENTO DE SEGURIDAD CIBERNÉTICA Y DE LA INFORMACIÓN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'administrar'),
(2, 'seguridad'),
(3, 'evaluacion'),
(4, 'consultas'),
(5, 'grafica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_usuario`
--

CREATE TABLE `permiso_usuario` (
  `idpermiso_usuario` int(11) NOT NULL,
  `idpermiso_fk` int(11) NOT NULL,
  `idusuario_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `permiso_usuario`
--

INSERT INTO `permiso_usuario` (`idpermiso_usuario`, `idpermiso_fk`, `idusuario_fk`) VALUES
(10, 1, 1),
(11, 2, 1),
(12, 3, 1),
(13, 4, 1),
(14, 5, 1),
(15, 1, 2),
(16, 2, 2),
(17, 5, 2),
(18, 3, 3),
(19, 4, 3),
(20, 5, 3),
(21, 4, 4),
(22, 5, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Evaluador'),
(3, 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo`
--

CREATE TABLE `titulo` (
  `idtitulo` int(11) NOT NULL,
  `idley` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `titulo`
--

INSERT INTO `titulo` (`idtitulo`, `idley`, `descripcion`) VALUES
(1, 1, 'La persona humana, fines y deberes del Estado'),
(2, 1, 'Derechos humanos'),
(3, 1, 'El Estado'),
(4, 1, 'Poder Público'),
(5, 1, 'Estructura y Organización del Estado'),
(6, 1, 'Garantías Constitucionales'),
(7, 1, 'Reformas a la Constitución'),
(8, 3, 'Sueldos'),
(9, 2, 'tiulo de prueba'),
(10, 4, 'TÍTULO I DISPOSICIONES GENERALES'),
(11, 4, 'TÍTULO II DEL PROGRAMA DE SEGURIDAD CIBERNÉTICA Y DE LA INFORMACIÓN'),
(12, 4, 'TÍTULO III COORDINACIÓN SECTORIAL DE RESPUESTA A INCIDENTES DE SEGURIDAD CIBERNÉTICA'),
(13, 4, 'TÍTULO IV DISPOSICIONES FINALES');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `idrol` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `login` varchar(20) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `idrol`, `nombre`, `apellido`, `telefono`, `login`, `clave`, `condicion`) VALUES
(1, 1, 'Walter Noe', 'Portillo Reyes', '12345678', 'noe', 'VzZNdzFZa1B6MTZxbU1DaHNsb1VWQT09', 1),
(2, 1, 'Rudi', 'Estrada', '78954745', 'rudi', 'VzZNdzFZa1B6MTZxbU1DaHNsb1VWQT09', 1),
(3, 2, 'Marvin', 'Chacon', '789979', 'mchacon', 'VzZNdzFZa1B6MTZxbU1DaHNsb1VWQT09', 1),
(4, 3, 'Fredy', 'Quiroa', '79452367', 'fredy', 'VzZNdzFZa1B6MTZxbU1DaHNsb1VWQT09', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`idarticulo`),
  ADD KEY `fk_articulo_capitulo_idx` (`idley`,`idtitulo`,`idcapitulo`);

--
-- Indices de la tabla `capitulo`
--
ALTER TABLE `capitulo`
  ADD PRIMARY KEY (`idcapitulo`),
  ADD KEY `fk_capitulo_titulo_idx` (`idley`,`idtitulo`);

--
-- Indices de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD PRIMARY KEY (`idevaluacion`),
  ADD KEY `fk_evaluacion_usuario_idx` (`idusuario`),
  ADD KEY `fk_evaluacion_ley_idx` (`idley`),
  ADD KEY `fk_evaluacion_titulo_idx` (`idtitulo`),
  ADD KEY `fk_evaluacion_capitulo_idx` (`idcapitulo`),
  ADD KEY `fk_evaluacion_artuculo_idx` (`idarticulo`),
  ADD KEY `fk_evaluacion_institucion_idx` (`idinstitucion`);

--
-- Indices de la tabla `institucion`
--
ALTER TABLE `institucion`
  ADD PRIMARY KEY (`idinstitucion`);

--
-- Indices de la tabla `ley`
--
ALTER TABLE `ley`
  ADD PRIMARY KEY (`idley`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  ADD PRIMARY KEY (`idpermiso_usuario`),
  ADD KEY `fk_permisousuario_permiso_idx` (`idpermiso_fk`),
  ADD KEY `fk_permisousuario_usuario_idx` (`idusuario_fk`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `titulo`
--
ALTER TABLE `titulo`
  ADD PRIMARY KEY (`idtitulo`),
  ADD KEY `fk_ley_titulo_idx` (`idley`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `login_UNIQUE` (`login`),
  ADD KEY `fk_usuario_cargo_idx` (`idrol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `capitulo`
--
ALTER TABLE `capitulo`
  MODIFY `idcapitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  MODIFY `idevaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `institucion`
--
ALTER TABLE `institucion`
  MODIFY `idinstitucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ley`
--
ALTER TABLE `ley`
  MODIFY `idley` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  MODIFY `idpermiso_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `titulo`
--
ALTER TABLE `titulo`
  MODIFY `idtitulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `fk_articulo_capitulo` FOREIGN KEY (`idley`,`idtitulo`,`idcapitulo`) REFERENCES `capitulo` (`idley`, `idtitulo`, `idcapitulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `capitulo`
--
ALTER TABLE `capitulo`
  ADD CONSTRAINT `fk_capitulo_titulo` FOREIGN KEY (`idley`,`idtitulo`) REFERENCES `titulo` (`idley`, `idtitulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `fk_evaluacion_artuculo` FOREIGN KEY (`idarticulo`) REFERENCES `articulo` (`idarticulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluacion_capitulo` FOREIGN KEY (`idcapitulo`) REFERENCES `capitulo` (`idcapitulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluacion_institucion` FOREIGN KEY (`idinstitucion`) REFERENCES `institucion` (`idinstitucion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluacion_ley` FOREIGN KEY (`idley`) REFERENCES `ley` (`idley`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluacion_titulo` FOREIGN KEY (`idtitulo`) REFERENCES `titulo` (`idtitulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_evaluacion_usuario` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  ADD CONSTRAINT `fk_permisousuario_permiso` FOREIGN KEY (`idpermiso_fk`) REFERENCES `permiso` (`idpermiso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permisousuario_usuario` FOREIGN KEY (`idusuario_fk`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `titulo`
--
ALTER TABLE `titulo`
  ADD CONSTRAINT `fk_ley_titulo` FOREIGN KEY (`idley`) REFERENCES `ley` (`idley`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`idrol`) REFERENCES `rol` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
