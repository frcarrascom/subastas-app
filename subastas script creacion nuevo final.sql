-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2022 a las 10:49:32
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `subastas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(2000) COLLATE utf8_spanish_ci NOT NULL,
  `codCategoria` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`nombre`, `descripcion`, `codCategoria`) VALUES
('Fin de la Probreza', 'A nivel mundial, el número de personas que viven en situación de extrema pobreza disminuyó desde un 36 % en 1990 hasta un 10 % en 2015. No obstante, el ritmo al que se produce este cambio está disminuyendo, y la crisis de la COVID-19 pone en riesgo décadas de progreso en la lucha contra la pobreza. Una nueva investigación publicada por el Instituto Mundial de Investigaciones de Economía del Desarrollo de la Universidad de las Naciones Unidas advierte de que las consecuencias económicas de la pandemia mundial podrían incrementar la pobreza en todo el mundo hasta llegar a afectar a 500 millones de personas más, o lo que es lo mismo, a un 8 % más de la población total mundial. Esta sería la primera vez que la pobreza aumente en todo el mundo en 30 años, desde 1990.\r\nMás de 700 millones de personas, o el 10 % de la población mundial, aún vive en situación de extrema pobreza a día de hoy, con dificultades para satisfacer las necesidades más básicas, como la salud, la educación y el acceso a agua y saneamiento, por nombrar algunas. La mayoría de las personas que viven con menos de 1,90 dólares al día viven en el África subsahariana. En todo el mundo, los índices de pobreza en las áreas rurales son del 17,2 %; más del triple de los mismos índices para las áreas urbanas.\r\nPara los que trabajan, su puesto de trabajo no les garantiza una vida digna. De hecho, el 8 % de los trabajadores de todo el mundo, y sus familias, vivían en situación de extrema pobreza en 2018. Uno de cada cinco niños vive en situación de extrema pobreza. Garantizar la protección social de todos los niños y otros grupos vulnerables resulta crucial para reducir la pobreza.', 1),
('Hambre Cero', 'Tras décadas de una disminución constante, el número de personas que padecen hambre (medido por la prevalencia de desnutrición) comenzó a aumentar lentamente de nuevo en 2015. Las estimaciones actuales indican que cerca de 690 millones de personas en el mundo padecen hambre, es decir, el 8,9 por ciento de la población mundial, lo que supone un aumento de unos 10 millones de personas en un año y de unos 60 millones en cinco años.\r\nEl mundo no está bien encaminado para alcanzar el objetivo de hambre cero para 2030. Si continúan las tendencias recientes, el número de personas afectadas por el hambre superará los 840 millones de personas para 2030.\r\nSegún el Programa Mundial de Alimentos, alrededor de 135 millones de personas padecen hambre severa Disponible en inglés, debido principalmente a los conflictos causados por los seres humanos, el cambio climático y las recesiones económicas. La pandemia de COVID-19 podría duplicar ahora esa cifra y sumar unos 130 millones de personas más que estarían en riesgo de padecer hambre severa a finales de 2020.\r\nCon más de 250 millones de personas que podrían encontrarse al borde de la hambruna Disponible en inglés, es necesario actuar rápidamente para proporcionar alimentos y ayuda humanitaria a las regiones que corren más riesgos.\r\nAl mismo tiempo, es necesario llevar a cabo un cambio profundo en el sistema agroalimentario mundial si queremos alimentar a más de 820 millones de personas que padecen hambre y a los 2000 millones de personas más que vivirán en el mundo en 2050. El aumento de la productividad agrícola y la producción alimentaria sostenible son cruciales para ayudar a aliviar los riesgos del hambre.', 2),
('Salud y Bienestar', 'Garantizar una vida sana y promover el bienestar en todas las edades es esencial para el desarrollo sostenible.\r\nActualmente, el mundo se enfrenta a una crisis sanitaria mundial sin precedentes; la COVID-19 está propagando el sufrimiento humano, desestabilizando la economía mundial y cambiando drásticamente las vidas de miles de millones de personas en todo el mundo.\r\nAntes de la pandemia, se consiguieron grandes avances en la mejora de la salud de millones de personas. En concreto, estos grandes avances se alcanzaron al aumentar la esperanza de vida y reducir algunas de las causas de muerte comunes asociadas con la mortalidad infantil y materna. Sin embargo, se necesitan más esfuerzos para erradicar por completo una gran variedad de enfermedades y abordar un gran número de problemas de salud, tanto constantes como emergentes. A través de una financiación más eficiente de los sistemas sanitarios, un mayor saneamiento e higiene, y un mayor acceso al personal médico, se podrán conseguir avances significativos a la hora de ayudar a salvar las vidas de millones de personas.\r\nLas emergencias sanitarias, como la derivada de la COVID-19, suponen un riesgo mundial y han demostrado que la preparación es vital. El Programa de las Naciones Unidas para el Desarrollo señaló las grandes diferencias relativas a las capacidades de los países para lidiar con la crisis de la COVID-19 y recuperarse de ella. La pandemia constituye un punto de inflexión en lo referente a la preparación para las emergencias sanitarias y la inversión en servicios públicos vitales del siglo XXI.', 3),
('Educación de Calidad', 'La educación permite la movilidad socioeconómica ascendente y es clave para salir de la pobreza. Durante la última década, se consiguieron grandes avances a la hora de ampliar el acceso a la educación y las tasas de matriculación en las escuelas en todos los niveles, especialmente para las niñas. No obstante, alrededor de 260 millones de niños aún estaban fuera de la escuela en 2018; cerca de una quinta parte de la población mundial de ese grupo de edad. Además, más de la mitad de todos los niños y adolescentes de todo el mundo no están alcanzando los estándares mínimos de competencia en lectura y matemáticas.\r\nEn 2020, a medida que la pandemia de la COVID-19 se propagaba por todo el planeta, la mayor parte de los países anunciaron el cierre temporal de las escuelas, lo que afectó a más del 91 % de los estudiantes en todo el mundo. En abril de 2020, cerca de 1600 millones de niños y jóvenes estaban fuera de la escuela. Igualmente, cerca de 369 millones de niños que dependen de los comedores escolares tuvieron que buscar otras fuentes de nutrición diaria.\r\nNunca antes habían estado tantos niños fuera de la escuela al mismo tiempo, lo que altera su aprendizaje y cambia drásticamente sus vidas, especialmente las de los niños más vulnerables y marginados. La pandemia mundial tiene graves consecuencias que pueden poner en peligro los avances que tanto costaron conseguir a la hora de mejorar la educación a nivel mundial.', 4),
('Igualdad de Genero', 'La igualdad de género no solo es un derecho humano fundamental, sino que es uno de los fundamentos esenciales para construir un mundo pacífico, próspero y sostenible.\r\nSe han conseguido algunos avances durante las últimas décadas: más niñas están escolarizadas, y se obliga a menos niñas al matrimonio precoz; hay más mujeres con cargos en parlamentos y en posiciones de liderazgo, y las leyes se están reformando para fomentar la igualdad de género.\r\nA pesar de estos logros, todavía existen muchas dificultades: las leyes y las normas sociales discriminatorias continúan siendo generalizadas, las mujeres siguen estando infrarrepresentadas a todos los niveles de liderazgo político, y 1 de cada 5 mujeres y niñas de entre 15 y 49 años afirma haber sufrido violencia sexual o física a manos de una pareja íntima en un período de 12 meses.\r\nLos efectos de la pandemia de la COVID-19 podrían revertir los escasos logros que se han alcanzado en materia de igualdad de género y derechos de las mujeres.  El brote de coronavirus agrava las desigualdades existentes para las mujeres y niñas a nivel mundial; desde la salud y la economía, hasta la seguridad y la protección social.\r\nLas mujeres desempeñan un papel desproporcionado en la respuesta al virus, incluso como trabajadoras sanitarias en primera línea y como cuidadoras en el hogar. El trabajo de cuidados no remunerado de las mujeres ha aumentado de manera significativa como consecuencia del cierre de las escuelas y el aumento de las necesidades de los ancianos. Las mujeres también se ven más afectadas por los efectos económicos de la COVID-19, ya que trabajan, de manera desproporcionada, en mercados laborales inseguros. Cerca del 60 % de las mujeres trabaja en la economía informal, lo que las expone aún más a caer en la pobreza.\r\nLa pandemia también ha conducido a un fuerte aumento de la violencia contra las mujeres y las niñas. Con las medidas de confinamiento en vigor, muchas mujeres se encuentran atrapadas en casa con sus abusado', 5),
('Agua Limpia y Saneamiento', 'Si bien se ha conseguido progresar de manera sustancial a la hora de ampliar el acceso a agua potable y saneamiento, existen miles de millones de personas (principalmente en áreas rurales) que aún carecen de estos servicios básicos. En todo el mundo, una de cada tres personas no tiene acceso a agua potable salubre, dos de cada cinco personas no disponen de una instalación básica destinada a lavarse las manos con agua y jabón, y más de 673 millones de personas aún defecan al aire libre.\r\nLa pandemia de la COVID-19 ha puesto de manifiesto la importancia vital del saneamiento, la higiene y un acceso adecuado a agua limpia para prevenir y contener las enfermedades. La higiene de manos salva vidas. De acuerdo con la Organización Mundial de la Salud, el lavado de manos es una de las acciones más efectivas que se pueden llevar a cabo para reducir la propagación de patógenos y prevenir infecciones, incluido el virus de la COVID-19. Aun así, hay miles de millones de personas que carecen de acceso a agua salubre y saneamiento, y los fondos son insuficientes.', 6),
('Energia Asequible y no contaminante', 'El mundo está avanzando hacia la consecución del Objetivo 7 con indicios alentadores de que la energía se está volviendo más sostenible y ampliamente disponible. El acceso a la electricidad en los países más pobres ha comenzado a acelerarse, la eficiencia energética continúa mejorando y la energía renovable está logrando resultados excelentes en el sector eléctrico.\r\nA pesar de ello, es necesario prestar una mayor atención a las mejoras para el acceso a combustibles de cocina limpios y seguros, y a tecnologías para 3000 millones de personas, para expandir el uso de la energía renovable más allá del sector eléctrico e incrementar la electrificación en el África subsahariana.\r\nEl informe de progreso en materia de energía proporciona un registro mundial del progreso relativo al acceso a la energía, la eficiencia energética y la energía renovable. Evalúa el progreso conseguido por cada país en estos tres pilares y ofrece una panorámica del camino que nos queda por recorrer para conseguir las metas de los Objetivos de Desarrollo Sostenible 2030.', 7),
('Trabajo Decente y Crecimiento Economico', 'Un crecimiento económico inclusivo y sostenido puede impulsar el progreso, crear empleos decentes para todos y mejorar los estándares de vida.\r\nLa COVID-19 ha alterado miles de millones de vidas y ha puesto en peligro la economía mundial. El Fondo Monetario Internacional (FMI) prevé una recesión mundial tan mala o peor que la de 2009. A medida que se intensifica la pérdida de empleo, la Organización Internacional del Trabajo estima que cerca de la mitad de todos los trabajadores a nivel mundial se encuentra en riesgo de perder sus medios de subsistencia.\r\nIncluso antes del brote de la COVID-19, era probable que uno de cada cinco países (en donde habitan miles de millones de personas que viven en situación de pobreza) vieran sus ingresos per cápita estancarse o reducirse en 2020. A día de hoy, las perturbaciones económicas y financieras derivadas de la COVID-19 (como las alteraciones en la producción industrial, la caída de los precios de los productos básicos, la volatilidad del mercado financiero y el aumento de la inseguridad) están desbaratando el ya de por sí tibio crecimiento económico y empeorando los riesgos acentuados de otros factores.', 8),
('Industria, Innovacion e Infraestructura', 'La industrialización inclusiva y sostenible, junto con la innovación y la infraestructura, pueden dar rienda suelta a las fuerzas económicas dinámicas y competitivas que generan el empleo y los ingresos. Estas desempeñan un papel clave a la hora de introducir y promover nuevas tecnologías, facilitar el comercio internacional y permitir el uso eficiente de los recursos.\r\nSin embargo, todavía queda un largo camino que recorrer para que el mundo pueda aprovechar al máximo este potencial. En especial, los países menos desarrollados necesitan acelerar el desarrollo de sus sectores manufactureros si desean conseguir la meta de 2030 y aumentar la inversión en investigación e innovación científicas.\r\nEl crecimiento del sector manufacturero a nivel mundial ha ido disminuyendo constantemente, incluso antes del brote de la pandemia de la COVID-19. La pandemia está afectando gravemente a las industrias manufactureras y está provocando alteraciones en las cadenas de valor mundiales y en el suministro de productos.\r\nLa innovación y el progreso tecnológico son claves para descubrir soluciones duraderas para los desafíos económicos y medioambientales, como el aumento de la eficiencia energética y de recursos. A nivel mundial, la inversión en investigación y desarrollo (I+D), como porcentaje del PIB, aumentó de un 1,5 % en el 2000 a un 1,7 % en el 2015, y continuó casi en el mismo nivel en el 2017. Sin embargo, en las regiones en desarrollo fue inferior al 1 %.\r\nEn términos de infraestructura de comunicaciones, más de la mitad de la población mundial está ahora conectada y casi toda la población global vive en un área con cobertura de red móvil. Se estima que, en 2019, el 96,5 % de la población tenía cobertura de red, como mínimo, 2G.', 9),
('Reduccion de las Desigualdades', 'Reducir las desigualdades y garantizar que nadie se queda atrás forma parte integral de la consecución de los Objetivos de Desarrollo Sostenible.\r\nLa desigualdad dentro de los países y entre estos es un continuo motivo de preocupación. A pesar de la existencia de algunos indicios positivos hacia la reducción de la desigualdad en algunas dimensiones, como la reducción de la desigualdad de ingresos en algunos países y el estatus comercial preferente que beneficia a los países de bajos ingresos, la desigualdad aún continúa.\r\nLa COVID-19 ha intensificado las desigualdades existentes y ha afectado más que nadie a los pobres y las comunidades más vulnerables. Ha sacado a la luz las desigualdades económicas y las frágiles redes de seguridad social que hacen que las comunidades vulnerables tengan que sufrir las consecuencias de la crisis.  Al mismo tiempo, las desigualdades sociales, políticas y económicas han amplificado los efectos de la pandemia.\r\n\r\nEn el frente económico, la pandemia de la COVID-19 ha aumentado significativamente el desempleo mundial y ha recortado drásticamente los ingresos de los trabajadores.\r\n\r\nLa COVID-19 también pone en riesgo los escasos avances que se han conseguido en materia de igualdad de género y derechos de las mujeres durante las últimas décadas. Prácticamente en todos los ámbitos, desde la salud hasta la economía, desde la seguridad hasta la protección social, los efectos de la COVID-19 han agravado la situación de las mujeres y las niñas simplemente como consecuencia de su sexo.\r\nLas desigualdades también están aumentando para las poblaciones vulnerables en países con sistemas sanitarios más deficientes y en países que se enfrentan a crisis humanitarias existentes. Los refugiados y los migrantes, así como los pueblos indígenas, los ancianos, las personas con discapacidad y los niños se encuentran especialmente en riesgo de ser excluidos. Además, el discurso de odio dirigido a los grupos vulnerables está en aumento.', 10),
('Ciudades y Comunidades Sostenibles', 'El mundo cada vez está más urbanizado. Desde 2007, más de la mitad de la población mundial ha estado viviendo en ciudades, y se espera que dicha cantidad aumente hasta el 60 % para 2030.\r\nLas ciudades y las áreas metropolitanas son centros neurálgicos del crecimiento económico, ya que contribuyen al 60 % aproximadamente del PIB mundial. Sin embargo, también representan alrededor del 70 % de las emisiones de carbono mundiales y más del 60 % del uso de recursos.\r\nLa rápida urbanización está dando como resultado un número creciente de habitantes en barrios pobres, infraestructuras y servicios inadecuados y sobrecargados (como la recogida de residuos y los sistemas de agua y saneamiento, carreteras y transporte), lo cual está empeorando la contaminación del aire y el crecimiento urbano incontrolado.\r\nEl impacto de la COVID-19 será más devastador en las zonas urbanas pobres y densamente pobladas, especialmente para el mil millón de personas que vive en asentamientos informales y en barrios marginales en todo el mundo, donde el hacinamiento también dificulta cumplir con las medidas recomendadas, como el distanciamiento social y el autoaislamiento.\r\nEl organismo de las Naciones Unidas para los alimentos, la FAO, advirtió de que el hambre y las muertes podrían aumentar de manera significativa en las zonas urbanas que no cuentan con medidas para garantizar que los residentes pobres y vulnerables tengan acceso a alimentos.', 11),
('Produccion y Consumo Responsable', 'El consumo y la producción mundiales (fuerzas impulsoras de la economía mundial) dependen del uso del medio ambiente natural y de los recursos de una manera que continúa teniendo efectos destructivos sobre el planeta.\r\nEl progreso económico y social conseguido durante el último siglo ha estado acompañado de una degradación medioambiental que está poniendo en peligro los mismos sistemas de los que depende nuestro desarrollo futuro (y ciertamente, nuestra supervivencia).\r\nEstos son algunos hechos y cifras:\r\nCada año, se estima que un tercio de toda la comida producida (el equivalente a 1300 millones de toneladas con un valor cercano al billón de dólares) acaba pudriéndose en los cubos de basura de los consumidores y minoristas, o estropeándose debido a un transporte y unas prácticas de recolección deficientes.\r\nSi todo el mundo cambiase sus bombillas por unas energéticamente eficientes, se ahorrarían 120 000 millones de dólares estadounidenses al año.\r\nEn caso de que la población mundial alcance los 9600 millones de personas en 2050, se podría necesitar el equivalente a casi tres planetas para proporcionar los recursos naturales necesarios para mantener los estilos de vida actuales.\r\nLa pandemia de la COVID-19 ofrece a los países la oportunidad de elaborar planes de recuperación que reviertan las tendencias actuales y cambien nuestros patrones de consumo y producción hacia un futuro más sostenible.\r\nEl consumo y la producción sostenibles consisten en hacer más y mejor con menos. También se trata de desvincular el crecimiento económico de la degradación medioambiental, aumentar la eficiencia de recursos y promover estilos de vida sostenibles.\r\nEl consumo y la producción sostenibles también pueden contribuir de manera sustancial a la mitigación de la pobreza y a la transición hacia economías verdes y con bajas emisiones de carbono.', 12),
('Accion por el Clima', 'El 2019 fue el segundo año más caluroso de todos los tiempos y marcó el final de la década más calurosa (2010-2019) que se haya registrado jamás.\r\nLos niveles de dióxido de carbono (CO2) y de otros gases de efecto invernadero en la atmósfera aumentaron hasta niveles récord en 2019.\r\nEl cambio climático está afectando a todos los países de todos los continentes. Está alterando las economías nacionales y afectando a distintas vidas. Los sistemas meteorológicos están cambiando, los niveles del mar están subiendo y los fenómenos meteorológicos son cada vez más extremos.\r\n\r\nA pesar de que se estima que las emisiones de gases de efecto invernadero caigan alrededor de un 6 % en 2020 debido a las restricciones de movimiento y las recesiones económicas derivadas de la pandemia de la COVID-19, esta mejora es solo temporal. El cambio climático no se va a pausar. Una vez que la economía mundial comience a recuperarse de la pandemia, se espera que las emisiones vuelvan a niveles mayores.\r\nEs necesario tomar medidas urgentes para abordar tanto la pandemia como la emergencia climática con el fin de salvar vidas y medios de subsistencia.\r\nEl Acuerdo de París, aprobado en 2015, aspira a reforzar la respuesta mundial a la amenaza del cambio climático manteniendo el aumento global de la temperatura durante este siglo muy por debajo de 2 grados Celsius con respecto a los niveles preindustriales. El acuerdo también aspira a reforzar la capacidad de los países para lidiar con los efectos del cambio climático mediante flujos financieros apropiados, un nuevo marco tecnológico y un marco de desarrollo de la capacidad mejorado.', 13),
('Vida Submarina', 'El océano impulsa los sistemas mundiales que hacen de la Tierra un lugar habitable para el ser humano. Nuestra lluvia, el agua potable, el tiempo, el clima, los litorales, gran parte de nuestra comida e incluso el oxígeno del aire que respiramos los proporciona y regula el mar.\r\nUna gestión cuidadosa de este recurso mundial esencial es una característica clave de un futuro sostenible. No obstante, en la actualidad, existe un deterioro continuo de las aguas costeras debido a la contaminación y a la acidificación de los océanos que está teniendo un efecto adverso sobre el funcionamiento de los ecosistemas y la biodiversidad. Asimismo, también está teniendo un impacto perjudicial sobre las pesquerías de pequeña escala.\r\nProteger nuestros océanos debe seguir siendo una prioridad. La biodiversidad marina es vital para la salud de las personas y de nuestro planeta. Las áreas marinas protegidas se deben gestionar de manera efectiva, al igual que sus recursos, y se deben poner en marcha reglamentos que reduzcan la sobrepesca, la contaminación marina y la acidificación de los océanos.', 14),
('Vida de Ecosistemas Terrestres', 'El brote de la COVID-19 resalta la necesidad de abordar las amenazas a las que se enfrentan las especies silvestres y los ecosistemas.\r\nEn 2016, el Programa de las Naciones Unidas para el Medio Ambiente (PNUMA) alertó de que un aumento mundial de las epidemias zoonóticas era motivo de preocupación. En concreto, señaló que el 75 % de todas las enfermedades infecciosas nuevas en humanos son zoonóticas y que dichas enfermedades están estrechamente relacionadas con la salud de los ecosistemas.\r\n«Con la COVID-19, el planeta ha enviado su mayor alerta hasta la fecha indicando que la humanidad debe cambiar», ha explicado la Directora Ejecutiva del PNUMA, Inger Andersen.\r\n\r\nEn Trabajar con el medio ambiente para proteger a las personas, el PNUMA detalla cómo «reconstruir mejor», mediante una base científica más sólida, políticas que contribuyan a un planeta más sano y más inversiones verdes.\r\nLa respuesta del PNUMA se ocupa de cuatro áreas:\r\nAyudar a las naciones a gestionar los desechos médicos de la COVID-19.\r\nProducir un cambio transformativo para la naturaleza y las personas.\r\nTrabajar para garantizar que los paquetes de recuperación económica creen resiliencia para crisis futuras.\r\nModernizar la gobernanza ambiental a nivel mundial.\r\nPara prevenir, detener y revertir la degradación de los ecosistemas de todo el mundo, las Naciones Unidas han declarado la Década para la Restauración de los Ecosistemas (2021-2030). Esta respuesta coordinada a nivel mundial ante la pérdida y degradación de los hábitats se centrará en desarrollar la voluntad y la capacidad políticas para restaurar la relación de los seres humanos con la naturaleza. Asimismo, se trata de una respuesta directa al aviso de la ciencia, tal y como se expresa en el Informe especial sobre cambio climático y tierra del Grupo Intergubernamental de Expertos sobre el Cambio Climático, a las decisiones adoptadas por todos los Estados Miembros de las Naciones Unidas en las convenciones de Río sobre cambio climático y b', 15),
('Paz, Justicia e Instituciones Solidas', 'Los conflictos, la inseguridad, las instituciones débiles y el acceso limitado a la justicia continúan suponiendo una grave amenaza para el desarrollo sostenible.\r\nEl número de personas que huyen de las guerras, las persecuciones y los conflictos superó los 70 millones en 2018, la cifra más alta registrada por la Oficina del Alto Comisionado de las Naciones Unidas para los Refugiados (ACNUR) en casi 70 años.\r\nEn 2019, las Naciones Unidas registraron 357 asesinatos y 30 desapariciones forzadas de defensores de los derechos humanos, periodistas y sindicalistas en 47 países.\r\nPor otro lado, los nacimientos de alrededor de uno de cada cuatro niños en todo el mundo con menos de 5 años nunca se registran de manera oficial, lo que les priva de una prueba de identidad legal, que es crucial para la protección de sus derechos y para el acceso a la justicia y a los servicios sociales.', 16),
('Alianza para Lograr los Objetivos', 'Los ODS solo se pueden conseguir con asociaciones mundiales sólidas y cooperación.\r\nPara que un programa de desarrollo se cumpla satisfactoriamente, es necesario establecer asociaciones inclusivas (a nivel mundial, regional, nacional y local) sobre principios y valores, así como sobre una visión y unos objetivos compartidos que se centren primero en las personas y el planeta.\r\nMuchos países requieren asistencia oficial para el desarrollo con el fin de fomentar el crecimiento y el comercio. Aun así, los niveles de ayuda están disminuyendo y los países donantes no han respetado su compromiso de aumentar la financiación para el desarrollo.\r\nDebido a la pandemia de la COVID-19, se espera que la economía mundial se contraiga fuertemente, en un 3 %, en 2020, lo que constituiría su peor recesión desde la Gran Depresión.\r\nAhora más que nunca es necesaria una sólida cooperación internacional con el fin de garantizar que los países que poseen los medios para recuperarse de la pandemia reconstruyan mejor y consigan los Objetivos de Desarrollo Sostenible.', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `codMensaje` int(12) NOT NULL,
  `codUsuarioEmisor` int(12) NOT NULL,
  `codUsuarioReceptor` int(12) NOT NULL,
  `asunto` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`codMensaje`, `codUsuarioEmisor`, `codUsuarioReceptor`, `asunto`, `mensaje`, `estado`, `fecha`) VALUES
(1, 3, 4, 'asdasd', 'asdasd', 'VI', '2022-12-02 00:00:00'),
(2, 3, 4, 'asdsdadas', 'aasdasdasdasasdas', 'VI', '2022-12-02 00:00:00'),
(3, 3, 4, 'prueba', 'prueba', 'VI', '2022-12-02 09:53:25'),
(4, 3, 4, 'prueba 2', 'asdwadaw', 'VI', '2022-12-02 10:03:28'),
(5, 3, 4, 'prueba 2', 'asdwadaw', 'NV', '2022-12-02 10:05:21'),
(8, 3, 4, 'prueba 2', 'asdwadaw', 'VI', '2022-12-02 10:06:57'),
(10, 3, 4, 'prueba 2', 'asdwadaw', 'VI', '2022-12-02 10:07:41'),
(11, 3, 4, 'prueba 2', 'asdwadaw', 'NV', '2022-12-02 10:08:25'),
(12, 3, 4, 'prueba 2', 'asdwadaw', 'VI', '2022-12-02 10:09:35'),
(13, 3, 24, 'asd', 'asd', 'NV', '2022-12-02 10:12:27'),
(16, 3, 4, 'asd', 'asd', 'NV', '2022-12-02 10:30:57'),
(23, 4, 3, 'asdasda', 'asdasdsdasdasasdas', 'VI', '2022-12-05 05:27:42'),
(85, 3, 35, 'borrar', 'borrar', 'NV', '2022-12-09 07:26:05'),
(87, 35, 35, 'borrar', 'borrar', 'VI', '2022-12-09 07:26:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajesborrados`
--

CREATE TABLE `mensajesborrados` (
  `codMensaje` int(12) NOT NULL,
  `codUsuarioEmisor` int(12) NOT NULL,
  `codUsuarioReceptor` int(12) NOT NULL,
  `asunto` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mensajesborrados`
--

INSERT INTO `mensajesborrados` (`codMensaje`, `codUsuarioEmisor`, `codUsuarioReceptor`, `asunto`, `mensaje`, `estado`, `fecha`) VALUES
(22, 3, 4, 'asd', 'qwe', 'BO', '0000-00-00 00:00:00'),
(23, 3, 4, 'prueba 2', 'asdwadaw', 'BO', '0000-00-00 00:00:00'),
(24, 3, 4, 'prueba 2', 'asdwadaw', 'BO', '0000-00-00 00:00:00'),
(25, 3, 3, 'dede', 'asd', 'BO', '0000-00-00 00:00:00'),
(26, 3, 3, 'dede', 'asd', 'BO', '0000-00-00 00:00:00'),
(27, 3, 4, 'prueba asd', 'praeasdasdadasdasdasdasdas', 'BO', '0000-00-00 00:00:00'),
(28, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(29, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(30, 3, 4, 'asd', 'asd', 'BO', '0000-00-00 00:00:00'),
(31, 1, 3, 'Subasta Finalizada', 'La subasta con nombre prueba para tiempo ha finalizado', 'BO', '0000-00-00 00:00:00'),
(32, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(33, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(34, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(35, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(36, 1, 34, 'Subasta Finalizada', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(37, 1, 34, 'Subasta Finalizada', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(38, 1, 34, 'Subasta Finalizada', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(39, 1, 34, 'Subasta Finalizada', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(40, 1, 34, 'Subasta Finalizada', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(41, 1, 34, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(42, 1, 34, 'Subasta Finalizada', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(43, 1, 34, 'Subasta Finalizada', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(44, 1, 34, 'Subasta Finalizada', 'La subasta con nombre prueba para tiempo ha finalizado', 'BO', '0000-00-00 00:00:00'),
(45, 1, 34, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(46, 34, 3, 'dede', 'dede', 'BO', '0000-00-00 00:00:00'),
(47, 34, 3, 'dede', 'deed', 'BO', '0000-00-00 00:00:00'),
(48, 34, 3, 'dede', 'dede', 'BO', '0000-00-00 00:00:00'),
(49, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(50, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(51, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(52, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(53, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(54, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(55, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(56, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(57, 34, 3, 'dedededede', 'ddede', 'BO', '0000-00-00 00:00:00'),
(58, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(59, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(60, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(61, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(62, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(63, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(64, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(65, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(66, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(67, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(68, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(69, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(70, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(71, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(72, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(73, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(74, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(75, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(76, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(77, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(78, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(79, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(80, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(81, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(82, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(83, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(84, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(85, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(86, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(87, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(88, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(89, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(90, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(91, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(92, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(93, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(94, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(95, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(96, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(97, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(98, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(99, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(100, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(101, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(102, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(103, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(104, 35, 3, 'deded', 'dedeed', 'BO', '0000-00-00 00:00:00'),
(105, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(106, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(107, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(108, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(109, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(110, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre: prueba dos', 'BO', '0000-00-00 00:00:00'),
(111, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(112, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(113, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(114, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(115, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(116, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(117, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(118, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(119, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(120, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(121, 1, 34, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre: prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(122, 1, 34, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre: prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(123, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(124, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(125, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(126, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(127, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(128, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(129, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(130, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(131, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(132, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(133, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(134, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(135, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(136, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(137, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(138, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(139, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(140, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(141, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(142, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(143, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(144, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(145, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(146, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(147, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(148, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(149, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(150, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(151, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(152, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(153, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(154, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(155, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(156, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(157, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(158, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(159, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(160, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(161, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(162, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(163, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(164, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(165, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(166, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(167, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(168, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(169, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(170, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(171, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(172, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(173, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(174, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(175, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(176, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(177, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(178, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(179, 1, 3, 'a', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(180, 1, 3, 'a', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(181, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(182, 1, 3, 'a', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(183, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(184, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(185, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(186, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(187, 1, 3, '103', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(188, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(189, 1, 3, '102', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(190, 1, 3, '87', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(191, 1, 3, '87', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(192, 1, 3, '102', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(193, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(194, 1, 3, '103', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(195, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(196, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(197, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(198, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(199, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(200, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(201, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(202, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(203, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(204, 1, 3, '87', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(205, 1, 3, '102', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(206, 1, 3, '103', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(207, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(208, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(209, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(210, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(211, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(212, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(213, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(214, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(215, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(216, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(217, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(218, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(219, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(220, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(221, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(222, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(223, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(224, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(225, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(226, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(227, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(228, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(229, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(230, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(231, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(232, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(233, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(234, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(235, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(236, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(237, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(238, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(239, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(240, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(241, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(242, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(243, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(244, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(245, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(246, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(247, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(248, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(249, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(250, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(251, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(252, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(253, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(254, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba dos', 'BO', '0000-00-00 00:00:00'),
(255, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= borrar', 'BO', '0000-00-00 00:00:00'),
(256, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para ver si fecha inicio funciona', 'BO', '0000-00-00 00:00:00'),
(257, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba para tiempo', 'BO', '0000-00-00 00:00:00'),
(258, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= borrar', 'BO', '0000-00-00 00:00:00'),
(259, 1, 3, 'Subasta Finalizada', 'Ha finalizado la subasta con nombre= prueba cuatro', 'BO', '0000-00-00 00:00:00'),
(260, 1, 3, 'Subasta Ganada!!', 'Enhorabuena, has ganado la puja con nombre= prueba cuatro', 'BO', '0000-00-00 00:00:00'),
(261, 4, 3, 'prueba desde asd', 'asdasddasaasdasadas', 'BO', '0000-00-00 00:00:00'),
(262, 3, 4, 'prueba 2', 'asdwadaw', 'BO', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productosubastado`
--

CREATE TABLE `productosubastado` (
  `codProductoSubastado` int(12) NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  `categoria` int(12) NOT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `dineroInvertir` double NOT NULL,
  `codUsuario` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productosubastado`
--

INSERT INTO `productosubastado` (`codProductoSubastado`, `fechaInicio`, `fechaFin`, `estado`, `nombre`, `precio`, `categoria`, `descripcion`, `dineroInvertir`, `codUsuario`) VALUES
(18, '2022-11-22 00:00:00', '2023-01-22 00:00:00', 'activa', 'eReader - Kobo Clara 2E, Para eBook, 6 \", 16 GB, 300 ppp, 1448 x 1072, E-Ink, Az', 190, 4, 'Si tienes dispositivos que ya no usas, podemos darles una segunda vida.\r\n\r\nVen a tu tienda MediaMarkt con tu antiguo aparato tecnológico o te lo pasamos a recoger donde nos indiques.\r\n\r\nLo llevaremos a nuestro centro de reacondicionamiento para arreglarlo y donarlo a Aldeas Infantiles SOS.\r\n\r\nSi no es posible darle una segunda vida, donaremos el valor reciclado a la misma organización.', 0.03, 3),
(19, '2022-11-22 00:00:00', '2023-01-22 00:00:00', 'activa', 'TV QLED 65\" - Samsung QE65QN85BATXXC, Neo QLED 4K, Procesador Neo QLED 4K con IA', 1500, 9, 'Mejor televisor del mercado', 0.05, 3),
(87, '2022-11-24 00:00:00', '2022-11-23 00:00:00', 'finalizadaVisto', 'prueba para tiempo', 14, 1, 'asdasdda', 0.03, 3),
(88, '2022-11-24 00:00:00', '2022-12-30 00:00:00', 'activa', 'Flexo Rabbit Mini Home', 25.5, 7, 'Dale vida al dormitorio de los más pequeños con este flexo de metal articulado.Escoge entre varios colores y dale todas las combinaciones que imagines.\r\n\r\nInspirada en las lámparas más industriales, pero con un toque juvenil, podrás, gracias a su cabeza basculante, orientar la luz a tu gusto.\r\n\r\nAdmite bombilla para rosca pequeña (E-14) y cuenta con eficiencia energética de las clases A++ a E.\r\n\r\nMedidas de la tulipa: 10,6 (diámetro) x 14,4 (largo) cm.\r\n\r\nMedidas de la base: 13,4 (diámetro) x 3,', 0.01, 3),
(90, '2022-10-11 00:00:00', '2022-11-23 00:00:00', 'finalizada', 'Alfombra kilim Ruby', 125, 12, 'El kilim Ruby se ha tejido en la India utilizando yute natural hilado a mano, formando un diseño tradicional multicolor.\r\n\r\nPerfecto para crear ambientes rústicos y contemporáneos, tanto en interiores como en exteriores, por lo que es recomendable limitar su exposición al sol y a la lluvia.\r\n\r\nEl yute es una fibra vegetal que destaca por su resistencia, durabilidad y sus propiedades aislantes y antiestáticas. Es un material 100% biodegradable y reciclable, que no genera impacto medioambiental ad', 0.03, 3),
(92, '2022-10-11 00:00:00', '2022-11-23 00:00:00', 'finalizada', 'Alfombra kilim Ruby', 125, 12, 'El kilim Ruby se ha tejido en la India utilizando yute natural hilado a mano, formando un diseño tradicional multicolor.\r\n\r\nPerfecto para crear ambientes rústicos y contemporáneos, tanto en interiores como en exteriores, por lo que es recomendable limitar su exposición al sol y a la lluvia.\r\n\r\nEl yute es una fibra vegetal que destaca por su resistencia, durabilidad y sus propiedades aislantes y antiestáticas. Es un material 100% biodegradable y reciclable, que no genera impacto medioambiental ad', 0.05, 4),
(93, '2022-10-11 00:00:00', '2022-11-23 00:00:00', 'finalizada', 'Alfombra kilim Ruby', 125, 12, 'El kilim Ruby se ha tejido en la India utilizando yute natural hilado a mano, formando un diseño tradicional multicolor.\r\n\r\nPerfecto para crear ambientes rústicos y contemporáneos, tanto en interiores como en exteriores, por lo que es recomendable limitar su exposición al sol y a la lluvia.\r\n\r\nEl yute es una fibra vegetal que destaca por su resistencia, durabilidad y sus propiedades aislantes y antiestáticas. Es un material 100% biodegradable y reciclable, que no genera impacto medioambiental ad', 0.01, 4),
(94, '2022-10-11 00:00:00', '2022-12-31 00:00:00', 'activa', 'Alfombra kilim Ruby', 125, 12, 'El kilim Ruby se ha tejido en la India utilizando yute natural hilado a mano, formando un diseño tradicional multicolor.\r\n\r\nPerfecto para crear ambientes rústicos y contemporáneos, tanto en interiores como en exteriores, por lo que es recomendable limitar su exposición al sol y a la lluvia.\r\n\r\nEl yute es una fibra vegetal que destaca por su resistencia, durabilidad y sus propiedades aislantes y antiestáticas. Es un material 100% biodegradable y reciclable, que no genera impacto medioambiental ad', 0.01, 4),
(95, '2022-11-30 00:00:00', '2022-12-31 00:00:00', 'activa', 'prueba 3', 14545.5, 5, 'asdasddasdas', 0.03, 4),
(104, '2022-10-11 00:00:00', '2022-12-08 00:00:00', 'finalizadaVisto', 'borrar', 1500, 16, 'borrar', 0.03, 35),
(106, '2022-12-11 00:00:00', '2022-12-14 00:00:00', 'activa', 'Té verde japonés sakura cereza Club del Gourmet 15 bolsitas', 10, 2, 'Esta deliciosa mezcla de té verde te transporta hasta Japón. Su sabor, marcado claramente por la cereza, es todo un deleite para el paladar. Más que un té, es una golosina.\r\n\r\nUn aroma y sabor suave con un toque ácido y afrutado. Posee un color verde amarillento con un resultado excepcional.\r\n\r\nProcedente de Japón.', 0.05, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puja`
--

CREATE TABLE `puja` (
  `codPuja` int(12) NOT NULL,
  `codProductoSubastado` int(12) NOT NULL,
  `codPujador` int(12) NOT NULL,
  `cantidad` double NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `puja`
--

INSERT INTO `puja` (`codPuja`, `codProductoSubastado`, `codPujador`, `cantidad`, `fecha`) VALUES
(12, 7, 3, 1, '2022-11-18 13:26:44'),
(13, 7, 3, 1, '2022-11-18 13:29:35'),
(14, 7, 3, 23, '2022-11-18 13:29:38'),
(15, 7, 3, 23, '2022-11-18 13:29:43'),
(16, 7, 3, 24, '2022-11-18 13:30:19'),
(17, 7, 3, 25, '2022-11-18 13:30:46'),
(18, 7, 3, 22, '2022-11-18 13:30:47'),
(19, 7, 3, 25, '2022-11-18 13:30:54'),
(20, 7, 3, 25, '2022-11-18 13:35:21'),
(21, 7, 3, 25, '2022-11-18 13:35:54'),
(22, 7, 3, 25, '2022-11-18 13:38:15'),
(23, 7, 3, 25, '2022-11-18 13:38:38'),
(24, 7, 3, 26, '2022-11-18 13:38:50'),
(25, 7, 3, 26, '2022-11-18 13:38:54'),
(26, 7, 3, 26, '2022-11-18 13:38:56'),
(27, 7, 3, 26, '2022-11-18 13:38:59'),
(28, 7, 3, 26, '2022-11-18 13:39:01'),
(29, 7, 3, 30, '2022-11-18 13:39:18'),
(30, 7, 3, 30, '2022-11-18 13:39:45'),
(31, 7, 3, 30, '2022-11-18 13:39:59'),
(32, 7, 3, 30, '2022-11-18 13:42:14'),
(33, 7, 3, 30, '2022-11-18 13:42:50'),
(34, 7, 3, 150, '2022-11-18 13:44:00'),
(35, 7, 3, 155, '2022-11-18 13:45:06'),
(36, 7, 3, 180, '2022-11-18 13:49:35'),
(37, 7, 3, 189, '2022-11-18 13:50:20'),
(38, 7, 3, 200, '2022-11-18 13:50:26'),
(39, 7, 3, 201, '2022-11-18 13:57:54'),
(40, 7, 3, 202, '2022-11-18 14:36:50'),
(41, 7, 3, 203, '2022-11-18 14:37:16'),
(42, 9, 3, 5, '2022-11-18 14:49:51'),
(43, 9, 3, 6, '2022-11-18 14:49:58'),
(44, 9, 3, 7, '2022-11-18 14:54:54'),
(45, 12, 3, 13, '2022-11-18 14:55:07'),
(46, 12, 3, 13.5, '2022-11-18 14:56:09'),
(47, 12, 3, 14.5, '2022-11-18 14:56:16'),
(48, 7, 3, 204, '2022-11-21 19:21:30'),
(49, 10, 3, 33.6, '2022-11-22 11:27:25'),
(50, 10, 3, 33.7, '2022-11-22 11:27:34'),
(52, 18, 3, 5, '2022-11-22 13:45:03'),
(56, 14, 3, 0.5, '2022-11-22 13:52:41'),
(57, 19, 3, 1501, '2022-11-22 14:22:29'),
(58, 18, 3, 190, '2022-11-22 14:23:02'),
(73, 95, 3, 14546, '2022-11-29 16:03:48'),
(74, 94, 3, 125.11, '2022-11-29 16:09:01'),
(75, 94, 3, 125.12, '2022-11-29 16:09:09'),
(76, 95, 3, 15000, '2022-11-30 13:01:17'),
(77, 94, 3, 126, '2022-11-30 13:21:09'),
(78, 94, 3, 127, '2022-11-30 13:30:08'),
(79, 94, 3, 150, '2022-11-30 13:30:12'),
(80, 94, 3, 245, '2022-11-30 13:30:15'),
(86, 88, 4, 30, '2022-11-30 14:11:21'),
(91, 88, 34, 31, '2022-12-09 16:06:04'),
(92, 88, 34, 32, '2022-12-09 16:06:08'),
(93, 88, 34, 33, '2022-12-09 16:06:08'),
(94, 88, 34, 34, '2022-12-09 16:06:09'),
(95, 87, 34, 326, '2022-12-09 16:06:09'),
(96, 87, 3, 326, '2022-12-09 16:06:09'),
(99, 104, 3, 1501, '2022-12-09 19:25:39'),
(100, 104, 3, 10200, '2022-12-09 19:25:44'),
(101, 88, 35, 35, '2022-12-09 19:26:47'),
(102, 88, 35, 38, '2022-12-09 19:26:49'),
(103, 88, 35, 40, '2022-12-09 19:26:53'),
(108, 104, 3, 500, '2022-12-09 19:26:53'),
(109, 19, 4, 15002, '2022-12-11 10:36:29'),
(110, 18, 4, 200, '2022-12-11 10:36:37'),
(111, 88, 4, 45, '2022-12-11 10:36:43'),
(112, 106, 3, 11, '2022-12-11 10:48:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `codUsuario` int(12) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `nombreUsuario` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(90) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`codUsuario`, `nombre`, `apellidos`, `nombreUsuario`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', 'admin'),
(2, 'UsuarioEliminado', 'UsuarioEliminado', 'UsuarioEliminado', 'UsuarioEliminado@msn.com', '1234'),
(3, 'dede', 'dedede', 'dede', 'dede@gmail.com', 'dede'),
(4, 'asd', 'asd', 'asd', 'asdasd@gmail.com', 'asd'),
(24, 'asdasd', 'asdasd', 'asdasd', 'eliminar@gmail.com', 'asdasd'),
(34, 'qweqwe', 'qweqwe', 'qweqwe', 'eliminar@gmail.com', 'qweqwe'),
(35, 'borrar', 'borrar', 'borrar', 'borrar@gmail.com', 'borrar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codCategoria`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`codMensaje`),
  ADD KEY `codUsuarioEmisor` (`codUsuarioEmisor`),
  ADD KEY `codUsuarioReceptor` (`codUsuarioReceptor`);

--
-- Indices de la tabla `mensajesborrados`
--
ALTER TABLE `mensajesborrados`
  ADD PRIMARY KEY (`codMensaje`),
  ADD KEY `codUsuarioEmisor` (`codUsuarioEmisor`),
  ADD KEY `codUsuarioReceptor` (`codUsuarioReceptor`);

--
-- Indices de la tabla `productosubastado`
--
ALTER TABLE `productosubastado`
  ADD PRIMARY KEY (`codProductoSubastado`),
  ADD KEY `categoriaFK` (`categoria`),
  ADD KEY `codUsuarioFK` (`codUsuario`);

--
-- Indices de la tabla `puja`
--
ALTER TABLE `puja`
  ADD PRIMARY KEY (`codPuja`),
  ADD KEY `codProductoSubastadoFK` (`codProductoSubastado`),
  ADD KEY `codUsuFK` (`codPujador`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`codUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `codMensaje` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT de la tabla `mensajesborrados`
--
ALTER TABLE `mensajesborrados`
  MODIFY `codMensaje` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT de la tabla `productosubastado`
--
ALTER TABLE `productosubastado`
  MODIFY `codProductoSubastado` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `puja`
--
ALTER TABLE `puja`
  MODIFY `codPuja` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `codUsuario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`codUsuarioEmisor`) REFERENCES `usuario` (`codUsuario`),
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`codUsuarioReceptor`) REFERENCES `usuario` (`codUsuario`);

--
-- Filtros para la tabla `productosubastado`
--
ALTER TABLE `productosubastado`
  ADD CONSTRAINT `categoriaFK` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`codCategoria`),
  ADD CONSTRAINT `codUsuarioFK` FOREIGN KEY (`codUsuario`) REFERENCES `usuario` (`codUsuario`);

--
-- Filtros para la tabla `puja`
--
ALTER TABLE `puja`
  ADD CONSTRAINT `codUsuFK` FOREIGN KEY (`codPujador`) REFERENCES `usuario` (`codUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
