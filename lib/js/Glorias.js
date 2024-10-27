let glorias;

document.addEventListener('DOMContentLoaded', function() {
    cargarEstados();
});

function cargarEstados() {
    const estados = [
        { id: 1, nombre: 'Amazonas' },
        { id: 2, nombre: 'Anzoátegui' },
        { id: 3, nombre: 'Apure' },
        { id: 4, nombre: 'Aragua' },
        { id: 5, nombre: 'Barinas' },
        { id: 6, nombre: 'Bolívar' },
        { id: 7, nombre: 'Carabobo' },
        { id: 8, nombre: 'Cojedes' },
        { id: 9, nombre: 'Delta Amacuro' },
        { id: 10, nombre: 'Distrito Capital' },
        { id: 11, nombre: 'Falcón' },
        { id: 12, nombre: 'Guárico' },
        { id: 13, nombre: 'Lara' },
        { id: 14, nombre: 'Mérida' },
        { id: 15, nombre: 'Miranda' },
        { id: 16, nombre: 'Monagas' },
        { id: 17, nombre: 'Nueva Esparta' },
        { id: 18, nombre: 'Portuguesa' },
        { id: 19, nombre: 'Sucre' },
        { id: 20, nombre: 'Táchira' },
        { id: 21, nombre: 'Trujillo' },
        { id: 22, nombre: 'Vargas' },
        { id: 23, nombre: 'Yaracuy' },
        { id: 24, nombre: 'Zulia' }
    ];
    

    const estadoSelect = document.getElementById('estado');
    estados.forEach(function(estado) {
        const option = document.createElement('option');
        option.value = estado.id;
        option.textContent = estado.nombre;
        estadoSelect.appendChild(option);
    });
}

document.getElementById('estado').addEventListener('change', function() {
    const estadoId = this.value;
    cargarMunicipios(estadoId);
});

function cargarMunicipios(estadoId) {
    const municipios = {
        1: [
            { id: 101, nombre: 'Alto Orinoco' },
            { id: 102, nombre: 'Atabapo' },
            { id: 103, nombre: 'Atures' },
            { id: 104, nombre: 'Autana' },
            { id: 105, nombre: 'Manapiare' },
            { id: 106, nombre: 'Maroa' },
            { id: 107, nombre: 'Río Negro' }
        ],
        2: [
            { id: 201, nombre: 'Anaco' },
            { id: 202, nombre: 'Aragua' },
            { id: 203, nombre: 'Bolívar' },
            { id: 204, nombre: 'Bruzual' },
            { id: 205, nombre: 'Cajigal' },
            { id: 206, nombre: 'Carvajal' },
            { id: 207, nombre: 'Guanta' },
            { id: 208, nombre: 'Independencia' },
            { id: 209, nombre: 'Libertad' },
            { id: 210, nombre: 'McGregor' },
            { id: 211, nombre: 'Miranda' },
            { id: 212, nombre: 'Monagas' },
            { id: 213, nombre: 'Peñalver' },
            { id: 214, nombre: 'Píritu' },
            { id: 215, nombre: 'San Juan de Capistrano' },
            { id: 216, nombre: 'Santa Ana' },
            { id: 217, nombre: 'Simón Bolívar' },
            { id: 218, nombre: 'Sotillo' },
            { id: 219, nombre: 'Urdaneta' }
        ],
        3: [
            { id: 301, nombre: 'Achaguas' },
            { id: 302, nombre: 'Biruaca' },
            { id: 303, nombre: 'Camejo' },
            { id: 304, nombre: 'Muñoz' },
            { id: 305, nombre: 'Páez' },
            { id: 306, nombre: 'Pedro Camejo' },
            { id: 307, nombre: 'Rómulo Gallegos' },
            { id: 308, nombre: 'San Fernando' }
        ],
        4: [
            { id: 401, nombre: 'Bolívar' },
            { id: 402, nombre: 'Camatagua' },
            { id: 403, nombre: 'Francisco Linares Alcántara' },
            { id: 404, nombre: 'Girardot' },
            { id: 405, nombre: 'José Ángel Lamas' },
            { id: 406, nombre: 'José Félix Ribas' },
            { id: 407, nombre: 'José Rafael Revenga' },
            { id: 408, nombre: 'Libertador' },
            { id: 409, nombre: 'Mario Briceño Iragorry' },
            { id: 410, nombre: 'Ocumare de la Costa de Oro' },
            { id: 411, nombre: 'San Casimiro' },
            { id: 412, nombre: 'San Sebastián' },
            { id: 413, nombre: 'Santiago Mariño' },
            { id: 414, nombre: 'Santos Michelena' },
            { id: 415, nombre: 'Sucre' },
            { id: 416, nombre: 'Tovar' },
            { id: 417, nombre: 'Urdaneta' },
            { id: 418, nombre: 'Zamora' }
        ],
        5: [
            { id: 501, nombre: 'Alberto Arvelo Torrealba' },
            { id: 502, nombre: 'Andrés Eloy Blanco' },
            { id: 503, nombre: 'Antonio José de Sucre' },
            { id: 504, nombre: 'Arismendi' },
            { id: 505, nombre: 'Barinas' },
            { id: 506, nombre: 'Bolívar' },
            { id: 507, nombre: 'Cruz Paredes' },
            { id: 508, nombre: 'Ezequiel Zamora' },
            { id: 509, nombre: 'Obispos' },
            { id: 510, nombre: 'Pedraza' },
            { id: 511, nombre: 'Rojas' },
            { id: 512, nombre: 'Sosa' }
        ],
        6: [
            { id: 601, nombre: 'Caroní' },
            { id: 602, nombre: 'Cedeño' },
            { id: 603, nombre: 'El Callao' },
            { id: 604, nombre: 'Gran Sabana' },
            { id: 605, nombre: 'Heres' },
            { id: 606, nombre: 'Piar' },
            { id: 607, nombre: 'Raúl Leoni' },
            { id: 608, nombre: 'Roscio' },
            { id: 609, nombre: 'Sifontes' },
            { id: 610, nombre: 'Sucre' },
            { id: 611, nombre: 'Padre Pedro Chien' }
        ],
        7: [
            { id: 701, nombre: 'Bejuma' },
            { id: 702, nombre: 'Carlos Arvelo' },
            { id: 703, nombre: 'Diego Ibarra' },
            { id: 704, nombre: 'Guacara' },
            { id: 705, nombre: 'Juan José Mora' },
            { id: 706, nombre: 'Libertador' },
            { id: 707, nombre: 'Los Guayos' },
            { id: 708, nombre: 'Miranda' },
            { id: 709, nombre: 'Montalbán' },
            { id: 710, nombre: 'Naguanagua' },
            { id: 711, nombre: 'Puerto Cabello' },
            { id: 712, nombre: 'San Diego' },
            { id: 713, nombre: 'San Joaquín' },
            { id: 714, nombre: 'Valencia' }
        ],
        8: [
            { id: 801, nombre: 'Anzoátegui' },
            { id: 802, nombre: 'Tinaquillo' },
            { id: 803, nombre: 'Girardot' },
            { id: 804, nombre: 'Lima Blanco' },
            { id: 805, nombre: 'Pao de San Juan Bautista' },
            { id: 806, nombre: 'Ricaurte' },
            { id: 807, nombre: 'Rómulo Gallegos' },
            { id: 808, nombre: 'San Carlos' },
            { id: 809, nombre: 'Tinaco' }
        ],
        9: [
            { id: 901, nombre: 'Antonio Díaz' },
            { id: 902, nombre: 'Casacoima' },
            { id: 903, nombre: 'Pedernales' },
            { id: 904, nombre: 'Tucupita' }
        ],
        10: [
            { id: 1001, nombre: 'Libertador' }
        ],
        11: [
            { id: 1101, nombre: 'Acosta' },
            { id: 1102, nombre: 'Bolívar' },
            { id: 1103, nombre: 'Buchivacoa' },
            { id: 1104, nombre: 'Cacique Manaure' },
            { id: 1105, nombre: 'Carirubana' },
            { id: 1106, nombre: 'Colina' },
            { id: 1107, nombre: 'Dabajuro' },
            { id: 1108, nombre: 'Democracia' },
            { id: 1109, nombre: 'Falcón' },
            { id: 1110, nombre: 'Federación' },
            { id: 1111, nombre: 'Jacura' },
            { id: 1112, nombre: 'Los Taques' },
            { id: 1113, nombre: 'Mauroa' },
            { id: 1114, nombre: 'Miranda' },
            { id: 1115, nombre: 'Monseñor Iturriza' },
            { id: 1116, nombre: 'Palmasola' },
            { id: 1117, nombre: 'Petit' },
            { id: 1118, nombre: 'Píritu' },
            { id: 1119, nombre: 'San Francisco' },
            { id: 1120, nombre: 'Silva' },
            { id: 1121, nombre: 'Sucre' },
            { id: 1122, nombre: 'Tocópero' },
            { id: 1123, nombre: 'Unión' },
            { id: 1124, nombre: 'Urumaco' },
            { id: 1125, nombre: 'Zamora' }
        ],
        12: [
            { id: 1201, nombre: 'Camaguán' },
            { id: 1202, nombre: 'Chaguaramas' },
            { id: 1203, nombre: 'El Socorro' },
            { id: 1204, nombre: 'Francisco de Miranda' },
            { id: 1205, nombre: 'José Félix Ribas' },
            { id: 1206, nombre: 'José Tadeo Monagas' },
            { id: 1207, nombre: 'Juan Germán Roscio' },
            { id: 1208, nombre: 'Julián Mellado' },
            { id: 1209, nombre: 'Las Mercedes' },
            { id: 1210, nombre: 'Leonardo Infante' },
            { id: 1211, nombre: 'Pedro Zaraza' },
            { id: 1212, nombre: 'Ortiz' },
            { id: 1213, nombre: 'San Gerónimo de Guayabal' },
            { id: 1214, nombre: 'San José de Guaribe' },
            { id: 1215, nombre: 'Santa María de Ipire' }
        ],
        13: [
            { id: 1301, nombre: 'Andrés Eloy Blanco' },
            { id: 1302, nombre: 'Crespo' },
            { id: 1303, nombre: 'Iribarren' },
            { id: 1304, nombre: 'Jiménez' },
            { id: 1305, nombre: 'Morán' },
            { id: 1306, nombre: 'Palavecino' },
            { id: 1307, nombre: 'Simón Planas' },
            { id: 1308, nombre: 'Torres' },
            { id: 1309, nombre: 'Urdaneta' }
        ],
        14: [
            { id: 1401, nombre: 'Alberto Adriani' },
            { id: 1402, nombre: 'Andrés Bello' },
            { id: 1403, nombre: 'Antonio Pinto Salinas' },
            { id: 1404, nombre: 'Aricagua' },
            { id: 1405, nombre: 'Arzobispo Chacón' },
            { id: 1406, nombre: 'Campo Elías' },
            { id: 1407, nombre: 'Caracciolo Parra Olmedo' },
            { id: 1408, nombre: 'Cardenal Quintero' },
            { id: 1409, nombre: 'Guaraque' },
            { id: 1410, nombre: 'Julio César Salas' },
            { id: 1411, nombre: 'Justo Briceño' },
            { id: 1412, nombre: 'Libertador' },
            { id: 1413, nombre: 'Miranda' },
            { id: 1414, nombre: 'Obispo Ramos de Lora' },
            { id: 1415, nombre: 'Padre Noguera' },
            { id: 1416, nombre: 'Pueblo Llano' },
            { id: 1417, nombre: 'Rangel' },
            { id: 1418, nombre: 'Rivas Dávila' },
            { id: 1419, nombre: 'Santos Marquina' },
            { id: 1420, nombre: 'Sucre' },
            { id: 1421, nombre: 'Tovar' },
            { id: 1422, nombre: 'Tulio Febres Cordero' },
            { id: 1423, nombre: 'Zea' }
        ],
        15: [
            { id: 1501, nombre: 'Acevedo' },
            { id: 1502, nombre: 'Andrés Bello' },
            { id: 1503, nombre: 'Baruta' },
            { id: 1504, nombre: 'Brión' },
            { id: 1505, nombre: 'Buroz' },
            { id: 1506, nombre: 'Carrizal' },
            { id: 1507, nombre: 'Chacao' },
            { id: 1508, nombre: 'Cristóbal Rojas' },
            { id: 1509, nombre: 'El Hatillo' },
            { id: 1510, nombre: 'Guaicaipuro' },
            { id: 1511, nombre: 'Independencia' },
            { id: 1512, nombre: 'Lander' },
            { id: 1513, nombre: 'Los Salias' },
            { id: 1514, nombre: 'Páez' },
            { id: 1515, nombre: 'Paz Castillo' },
            { id: 1516, nombre: 'Pedro Gual' },
            { id: 1517, nombre: 'Plaza' },
            { id: 1518, nombre: 'Simón Bolívar' },
            { id: 1519, nombre: 'Sucre' },
            { id: 1520, nombre: 'Urdaneta' },
            { id: 1521, nombre: 'Zamora' }
        ],
        16: [
            { id: 1601, nombre: 'Acosta' },
            { id: 1602, nombre: 'Aguasay' },
            { id: 1603, nombre: 'Bolívar' },
            { id: 1604, nombre: 'Caripe' },
            { id: 1605, nombre: 'Cedeño' },
            { id: 1606, nombre: 'Ezequiel Zamora' },
            { id: 1607, nombre: 'Libertador' },
            { id: 1608, nombre: 'Maturín' },
            { id: 1609, nombre: 'Piar' },
            { id: 1610, nombre: 'Punceres' },
            { id: 1611, nombre: 'Santa Bárbara' },
            { id: 1612, nombre: 'Sotillo' },
            { id: 1613, nombre: 'Uracoa' }
        ],
        17: [
            { id: 1701, nombre: 'Antolín del Campo' },
            { id: 1702, nombre: 'Arismendi' },
            { id: 1703, nombre: 'Díaz' },
            { id: 1704, nombre: 'García' },
            { id: 1705, nombre: 'Gómez' },
            { id: 1706, nombre: 'Maneiro' },
            { id: 1707, nombre: 'Marcano' },
            { id: 1708, nombre: 'Mariño' },
            { id: 1709, nombre: 'Península de Macanao' },
            { id: 1710, nombre: 'Tubores' },
            { id: 1711, nombre: 'Villalba' }
        ],
        18: [
            { id: 1801, nombre: 'Agua Blanca' },
            { id: 1802, nombre: 'Araure' },
            { id: 1803, nombre: 'Esteller' },
            { id: 1804, nombre: 'Guanare' },
            { id: 1805, nombre: 'Guanarito' },
            { id: 1806, nombre: 'Monseñor José Vicente de Unda' },
            { id: 1807, nombre: 'Ospino' },
            { id: 1808, nombre: 'Páez' },
            { id: 1809, nombre: 'Papelón' },
            { id: 1810, nombre: 'San Genaro de Boconoíto' },
            { id: 1811, nombre: 'San Rafael de Onoto' },
            { id: 1812, nombre: 'Santa Rosalía' },
            { id: 1813, nombre: 'Sucre' },
            { id: 1814, nombre: 'Turén' }
        ],
        19: [
            { id: 1901, nombre: 'Andrés Eloy Blanco' },
            { id: 1902, nombre: 'Andrés Mata' },
            { id: 1903, nombre: 'Arismendi' },
            { id: 1904, nombre: 'Benítez' },
            { id: 1905, nombre: 'Bermúdez' },
            { id: 1906, nombre: 'Bolívar' },
            { id: 1907, nombre: 'Cajigal' },
            { id: 1908, nombre: 'Cruz Salmerón Acosta' },
            { id: 1909, nombre: 'Libertador' },
            { id: 1910, nombre: 'Mariño' },
            { id: 1911, nombre: 'Mejía' },
            { id: 1912, nombre: 'Montes' },
            { id: 1913, nombre: 'Ribero' },
            { id: 1914, nombre: 'Sucre' },
            { id: 1915, nombre: 'Valdez' }
        ],
        20: [
            { id: 2001, nombre: 'Andrés Bello' },
            { id: 2002, nombre: 'Antonio Rómulo Costa' },
            { id: 2003, nombre: 'Ayacucho' },
            { id: 2004, nombre: 'Bolívar' },
            { id: 2005, nombre: 'Cárdenas' },
            { id: 2006, nombre: 'Córdoba' },
            { id: 2007, nombre: 'Fernández Feo' },
            { id: 2008, nombre: 'Francisco de Miranda' },
            { id: 2009, nombre: 'García de Hevia' },
            { id: 2010, nombre: 'Guásimos' },
            { id: 2011, nombre: 'Independencia' },
            { id: 2012, nombre: 'Jáuregui' },
            { id: 2013, nombre: 'José María Vargas' },
            { id: 2014, nombre: 'Junín' },
            { id: 2015, nombre: 'Libertad' },
            { id: 2016, nombre: 'Libertador' },
            { id: 2017, nombre: 'Lobatera' },
            { id: 2018, nombre: 'Michelena' },
            { id: 2019, nombre: 'Panamericano' },
            { id: 2020, nombre: 'Pedro María Ureña' },
            { id: 2021, nombre: 'Rafael Urdaneta' },
            { id: 2022, nombre: 'Samuel Darío Maldonado' },
            { id: 2023, nombre: 'San Cristóbal' },
            { id: 2024, nombre: 'Seboruco' },
            { id: 2025, nombre: 'Simón Rodríguez' },
            { id: 2026, nombre: 'Sucre' },
            { id: 2027, nombre: 'Torbes' },
            { id: 2028, nombre: 'Uribante' },
            { id: 2029, nombre: 'San Judas Tadeo' }
        ],
        21: [
            { id: 2101, nombre: 'Andrés Bello' },
            { id: 2102, nombre: 'Boconó' },
            { id: 2103, nombre: 'Bolívar' },
            { id: 2104, nombre: 'Candelaria' },
            { id: 2105, nombre: 'Carache' },
            { id: 2106, nombre: 'Escuque' },
            { id: 2107, nombre: 'José Felipe Márquez Cañizalez' },
            { id: 2108, nombre: 'Juan Vicente Campo Elías' },
            { id: 2109, nombre: 'La Ceiba' },
            { id: 2110, nombre: 'Miranda' },
            { id: 2111, nombre: 'Monte Carmelo' },
            { id: 2112, nombre: 'Motatán' },
            { id: 2113, nombre: 'Pampán' },
            { id: 2114, nombre: 'Pampanito' },
            { id: 2115, nombre: 'Rafael Rangel' },
            { id: 2116, nombre: 'San Rafael de Carvajal' },
            { id: 2117, nombre: 'Sucre' },
            { id: 2118, nombre: 'Trujillo' },
            { id: 2119, nombre: 'Urdaneta' },
            { id: 2120, nombre: 'Valera' }
        ],
        22: [
            { id: 2201, nombre: 'Vargas' }
        ], 
        23: [
            { id: 2301, nombre: 'Arístides Bastidas' },
            { id: 2302, nombre: 'Bolívar' },
            { id: 2303, nombre: 'Bruzual' },
            { id: 2304, nombre: 'Cocorote' },
            { id: 2305, nombre: 'Independencia' },
            { id: 2306, nombre: 'José Antonio Páez' },
            { id: 2307, nombre: 'La Trinidad' },
            { id: 2308, nombre: 'Manuel Monge' },
            { id: 2309, nombre: 'Nirgua' },
            { id: 2310, nombre: 'Peña' },
            { id: 2311, nombre: 'San Felipe' },
            { id: 2312, nombre: 'Sucre' },
            { id: 2313, nombre: 'Urachiche' },
            { id: 2314, nombre: 'Veroes' }
        ],
        24: [
            { id: 2401, nombre: 'Almirante Padilla' },
            { id: 2402, nombre: 'Baralt' },
            { id: 2403, nombre: 'Cabimas' },
            { id: 2404, nombre: 'Catatumbo' },
            { id: 2405, nombre: 'Colón' },
            { id: 2406, nombre: 'Francisco Javier Pulgar' },
            { id: 2407, nombre: 'Jesús Enrique Lossada' },
            { id: 2408, nombre: 'Jesús María Semprún' },
            { id: 2409, nombre: 'La Cañada de Urdaneta' },
            { id: 2410, nombre: 'Lagunillas' },
            { id: 2411, nombre: 'Machiques de Perijá' },
            { id: 2412, nombre: 'Mara' },
            { id: 2413, nombre: 'Maracaibo' },
            { id: 2414, nombre: 'Miranda' },
            { id: 2415, nombre: 'Páez' },
            { id: 2416, nombre: 'Rosario de Perijá' },
            { id: 2417, nombre: 'San Francisco' },
            { id: 2418, nombre: 'Santa Rita' },
            { id: 2419, nombre: 'Simón Bolívar' },
            { id: 2420, nombre: 'Sucre' },
            { id: 2421, nombre: 'Valmore Rodríguez' }
        ]
    };
    

    const municipioSelect = document.getElementById('municipio');
    municipioSelect.innerHTML = '<option value="">Seleccione un municipio</option>'; // Limpiar

    if (municipios[estadoId]) {
        municipios[estadoId].forEach(function(municipio) {
            const option = document.createElement('option');
            option.value = municipio.id;
            option.textContent = municipio.nombre;
            municipioSelect.appendChild(option);
        });
    }
}

$(document).ready(function () {
    if ($.fn.dataTable.isDataTable('.table')) {
        $('.table').DataTable().destroy();
    }

    let table = $('.table').DataTable({
        "processing": true,
        "serverSide": true,
        "paging": true,
        "ordering": true,
        "searching": true,
        "ajax": {
            "url": './controllers/dataTableGlorias.php',
            "type": "POST",
            "data": function (d) {
                return JSON.stringify(d);
            },
            "contentType": "application/json",
            "dataSrc": function (json) {
                return json.data;
            }
        },
        "columns": [
            { "data": "cedula" },
            { "data": "nombre_completo" },
            {
                "data": null,
                "render": function (data, type, row) {
                    return `<div class="btn-container"><button type="button" id="btn-view" class="btn-sm btn-primary btn btn3d" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-people-roof"></i></button></div>`;
                }
            },
            {
                "data": null,
                "render": function (data, type, row) {
                    return `<div class="btn-container"><button type="button" id="btn-view" class="btn-sm btn-success btn btn3d" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-medal"></i></button></div>`;
                }
            },
            {
                "data": null,
                "render": function (data, type, row) {
                    return `<div class="btn-container">
                                <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
                                <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${row.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                                <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${row.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
                            </div>`;
                }
            } 
        ]
    });

    $.ajax({
        url: './controllers/dataTableGlorias.php',
        method: 'POST',
        success: function (data) {
            glorias = JSON.parse(data);
            glorias.forEach(function (gloria) {
                table.row.add([
                    gloria.cedula,
                    gloria.nombre,
                    `<button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${gloria.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>`
                ]).draw(false);
            });
            table.columns.adjust().draw();
        },
        error: function (error) {
            console.error('Error al cargar los datos:', error);
        }
    });

    //Visualizar
    $(document).on('click', '#btn-view', function() {
        let id = $(this).data('id');
        let gloria = glorias.find(s => s.id == id);
    
        if (gloria) {
            $('#idgloria').val(gloria.id);
            $('#nombre').val(gloria.nombre).prop('disabled', true);
            $('#ubicacion').val(gloria.ubicacion).prop('disabled', true);
            $('#subsede').val(gloria.subsede).prop('disabled', true);
            $('#encargado').val(gloria.encargado).prop('disabled', true);
            $('#trabajadores').val(gloria.trabajadores).prop('disabled', true);
            $('#institucion').val(gloria.institucion).prop('disabled', true);
            $('#f_inicio').val(gloria.f_inicio).prop('disabled', true);
            $('#f_fin').val(gloria.f_fin).prop('disabled', true);
            $('#actividad').val(gloria.actividad).prop('disabled', true);
            $('#btn-Guardar').hide();
        } 
    });

    //Editar
    $(document).on('click', '#btn-edit', function() {
        let id = $(this).data('id');
        let gloria = glorias.find(s => s.id === id);
        limpiar();
        if (gloria) {
            $('#idgloria').val(gloria.id);
            $('#nombre').val(gloria.nombre);
            $('#ubicacion').val(gloria.ubicacion);
            $('#subsede').val(gloria.subsede);
            $('#encargado').val(gloria.encargado);
            $('#trabajadores').val(gloria.trabajadores);
            $('#institucion').val(gloria.institucion);
            $('#f_inicio').val(gloria.f_inicio);
            $('#f_fin').val(gloria.f_fin);
            
            $('#actividad').val(gloria.actividad);
        } 
    });

    $(document).on('click', '#btn-create', function() {
        limpiar();
    });
    
    //Eliminar
    $(document).on('click', '#btn-delete', function() {
        let id = $(this).data('id');
        Swal.fire({
            title: "Desea eliminar esta información?",
            text: "Los datos almacenados en este registro no podran ser recuperados!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, eliminar!"
          }).then((result) => {
            if (result.isConfirmed) {
                let row = $(this).closest('tr');
                $.ajax({
                    url: './controllers/gloriasController.php',
                    method: 'DELETE',
                    data: {
                        idgloria: id
                    },
                    success: function(response) {
                        sAlert("success","Datos eliminados con éxito");
                        table.row(row).remove().draw(false);
                        let index = glorias.findIndex(gloria => gloria.id == id);
                        glorias.splice(index, 1);
                    },
                    error: function(error) {
                        sAlert("error","Error en cargar datos");
                    }
                });
            }
          });
    });

    // Guardar: insertar y actualizar
    $(document).on('click', '#btn-Guardar', function() {
    var isValid = true;
    var insert = true;
   
    if ($('#idgloria').val()) {
        insert = false; // Cambia a false si hay un ID de registro
    }
    if (!$('#nombre').val()) {
        $('#textErrorNombre').show();
        $('#nombre').addClass('border-red');
        isValid = false;
    }
    if (!$('#ubicacion').val()) {
        $('#textErrorUbicacion').show();
        $('#ubicacion').addClass('border-red');
        isValid = false;
    }
    if (!$('#actividad').val()) {
        $('#textErrorActividad').show();
        $('#actividad').addClass('border-red');
        isValid = false;
    }

    if (isValid) {
        let id = $('#idgloria').val();
        
        let nombre = $('#nombre').val();
        let ubicacion = $('#ubicacion').val();
        let subsede = $('#subsede').val();
        let encargado = $('#encargado').val();
        let trabajadores = $('#trabajadores').val();
        let institucion = $('#institucion').val();
        let f_inicio = $('#f_inicio').val();
        let f_fin = $('#f_fin').val();
        let actividad = $('#actividad').val();
        
        deshabilitar();
        $.ajax({
            url: './controllers/gloriasController.php',
            method: 'POST',
            data: {
                nombre: nombre,
                ubicacion: ubicacion,
                subsede: subsede,
                encargado: encargado,
                trabajadores: trabajadores,
                institucion: institucion,
                f_inicio: f_inicio,
                f_fin: f_fin,
                actividad: actividad,                            
                insert: insert,
                idgloria: $('#idgloria').val()
            },
            success: function(response) {
               limpiar();
               habiliar();
               $('#staticBackdrop').modal('hide');//Ocultar modal
               sAlert("success","Datos guardados con éxito");
               if(!insert){//
                // Encuentra el índice de la gloria a actualizar
                let index = glorias.findIndex(gloria => gloria.id == id);
                glorias[index].nombre = nombre;
                glorias[index].ubicacion = ubicacion;
                glorias[index].subsede = subsede;
                glorias[index].encargado = encargado;
                glorias[index].trabajadores = trabajadores;
                glorias[index].institucion = institucion;
                glorias[index].f_inicio = f_inicio;
                glorias[index].f_fin = f_fin;
                glorias[index].actividad = actividad;
                glorias[index].id = Number(id);
                actualizarDatatable();
                console.log("Actualizar gloria");
                console.log("ID="+id);
               }
               else{
                actualizarDatatableConsulta();
               }
               
            },
            error: function(error) {
                // Manejar el error
                sAlert("error","Error en cargar datos");
                $('#staticBackdrop').modal('hide');//Ocultar modal
                habiliar();
            }
        });
    }    

    });
    
});

function actualizarDatatableConsulta(){
    
    let table = $('.table').DataTable();
    // Mostrar el spinner
    $('#spinner-container').show();
    table.clear();

    $.ajax({
        url: './controllers/gloriasController.php', 
        method: 'GET',
        success: function(data) {
            glorias = JSON.parse(data);
            glorias.forEach(function(gloria) {
                table.row.add([
                    gloria.nombre,
                    gloria.ubicacion,
                    `<div class="btn-container">
                        <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${gloria.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
                        <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${gloria.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
                        <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${gloria.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
                    </div>`
                ]).draw(false);
            });
            console.log(glorias);
            table.columns.adjust().draw();
            $('#spinner-container').hide();
        },
        error: function(error) {
            console.error('Error al cargar los datos:', error);
        }
    });
}

function actualizarDatatable(){
  glorias.sort((a, b) => a.nombre.localeCompare(b.nombre));
  // Limpiar el DataTable
  let table = $('.table').DataTable();
  table.clear();
  $('#spinner-container').show();
  glorias.forEach(function(gloria) {
    table.row.add([
        gloria.nombre,
        gloria.ubicacion,
        `<div class="btn-container">
            <button type="button" id="btn-view" class="btn-sm btn-info btn btn3d" data-id="${gloria.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-regular fa-eye"></i></button>
            <button type="button" id="btn-edit" class="btn-sm btn-warning btn btn3d" data-id="${gloria.id}" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-duotone fa-solid fa-pen-to-square"></i></button>
            <button type="button" id="btn-delete" class="btn-sm btn-danger btn btn3d" data-id="${gloria.id}"><i class="fa-duotone fa-solid fa-trash"></i></button>
        </div>`
            ]).draw(false);
        });
   table.columns.adjust().draw();  
   $('#spinner-container').hide(); 
}

function deshabilitar(){    
    $('#idgloria').prop('disabled', true);
    $('#nombre').prop('disabled', true);
    $('#ubicacion').prop('disabled', true);
    $('#subsede').prop('disabled', true);
    $('#encargado').prop('disabled', true);
    $('#trabajadores').prop('disabled', true);
    $('#institucion').prop('disabled', true);
    $('#f_inicio').prop('disabled', true);
    $('#f_fin').prop('disabled', true);
    $('#actividad').prop('disabled', true);
    $(".spinner-grow").show();//Mostar Spiner
}

function habiliar(){ 
    $('#idgloria').prop('disabled', false);
    $('#nombre').prop('disabled', false);
    $('#ubicacion').prop('disabled', false);
    $('#subsede').prop('disabled', false);
    $('#encargado').prop('disabled', false);
    $('#trabajadores').prop('disabled', false);
    $('#institucion').prop('disabled', false);
    $('#f_inicio').prop('disabled', false);
    $('#f_fin').prop('disabled', false);
    $('#actividad').prop('disabled', false);
    $(".spinner-grow").hide();//Acultar Spiner
}

function sAlert(icono,mensaje){
    Swal.fire({
        icon: icono,
        title: mensaje,
    });
    limpiar();
}

function limpiar(){
    $('#nombre').val("").prop('disabled', false);
    $('#ubicacion').val("").prop('disabled', false);
    $('#subsede').val("").prop('disabled', false);
    $('#encargado').val("").prop('disabled', false);
    $('#trabajadores').val("").prop('disabled', false);
    $('#institucion').val("").prop('disabled', false);
    $('#f_inicio').val("").prop('disabled', false);
    $('#f_fin').val("").prop('disabled', false);
    $('#actividad').val("").prop('disabled', false);
   
    $('#btn-Guardar').show();
    $('#idgloria').val("");

    $('#textErrorNombre').hide();
    $('#textErrorActividad').hide();
    $('#textErrorUbicacion').hide();
    $('#nombre').removeClass('border-red');
    $('#actividad').removeClass('border-red');
    $('#ubicacion').removeClass('border-red');
}




