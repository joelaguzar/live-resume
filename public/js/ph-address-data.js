/**
 * Complete Philippine Address Data
 * Regions, Provinces, and Cities/Municipalities
 */

const philippineAddressData = {
    'NCR': {
        name: 'National Capital Region (NCR)',
        provinces: {
            'Metro Manila': {
                name: 'Metro Manila',
                cities: ['Caloocan', 'Las Piñas', 'Makati', 'Malabon', 'Mandaluyong', 'Manila', 'Marikina', 'Muntinlupa', 'Navotas', 'Parañaque', 'Pasay', 'Pasig', 'Pateros', 'Quezon City', 'San Juan', 'Taguig', 'Valenzuela']
            }
        }
    },
    'CAR': {
        name: 'Cordillera Administrative Region (CAR)',
        provinces: {
            'Abra': {
                name: 'Abra',
                cities: ['Bangued', 'Boliney', 'Bucay', 'Bucloc', 'Daguioman', 'Danglas', 'Dolores', 'La Paz', 'Lacub', 'Lagangilang', 'Lagayan', 'Langiden', 'Licuan-Baay', 'Luba', 'Malibcong', 'Manabo', 'Peñarrubia', 'Pidigan', 'Pilar', 'Sallapadan', 'San Isidro', 'San Juan', 'San Quintin', 'Tayum', 'Tineg', 'Tubo', 'Villaviciosa']
            },
            'Apayao': {
                name: 'Apayao',
                cities: ['Calanasan', 'Conner', 'Flora', 'Kabugao', 'Luna', 'Pudtol', 'Santa Marcela']
            },
            'Benguet': {
                name: 'Benguet',
                cities: ['Atok', 'Baguio City', 'Bakun', 'Bokod', 'Buguias', 'Itogon', 'Kabayan', 'Kapangan', 'Kibungan', 'La Trinidad', 'Mankayan', 'Sablan', 'Tuba', 'Tublay']
            },
            'Ifugao': {
                name: 'Ifugao',
                cities: ['Aguinaldo', 'Alfonso Lista', 'Asipulo', 'Banaue', 'Hingyon', 'Hungduan', 'Kiangan', 'Lagawe', 'Lamut', 'Mayoyao', 'Tinoc']
            },
            'Kalinga': {
                name: 'Kalinga',
                cities: ['Balbalan', 'Lubuagan', 'Pasil', 'Pinukpuk', 'Rizal', 'Tabuk City', 'Tanudan', 'Tinglayan']
            },
            'Mountain Province': {
                name: 'Mountain Province',
                cities: ['Barlig', 'Bauko', 'Besao', 'Bontoc', 'Natonin', 'Paracelis', 'Sabangan', 'Sadanga', 'Sagada', 'Tadian']
            }
        }
    },
    'Region I': {
        name: 'Ilocos Region (Region I)',
        provinces: {
            'Ilocos Norte': {
                name: 'Ilocos Norte',
                cities: ['Adams', 'Bacarra', 'Badoc', 'Bangui', 'Banna', 'Batac City', 'Burgos', 'Carasi', 'Currimao', 'Dingras', 'Dumalneg', 'Laoag City', 'Marcos', 'Nueva Era', 'Pagudpud', 'Paoay', 'Pasuquin', 'Piddig', 'Pinili', 'San Nicolas', 'Sarrat', 'Solsona', 'Vintar']
            },
            'Ilocos Sur': {
                name: 'Ilocos Sur',
                cities: ['Alilem', 'Banayoyo', 'Bantay', 'Burgos', 'Cabugao', 'Candon City', 'Caoayan', 'Cervantes', 'Galimuyod', 'Gregorio del Pilar', 'Lidlidda', 'Magsingal', 'Nagbukel', 'Narvacan', 'Quirino', 'Salcedo', 'San Emilio', 'San Esteban', 'San Ildefonso', 'San Juan', 'San Vicente', 'Santa', 'Santa Catalina', 'Santa Cruz', 'Santa Lucia', 'Santa Maria', 'Santiago', 'Santo Domingo', 'Sigay', 'Sinait', 'Sugpon', 'Suyo', 'Tagudin', 'Vigan City']
            },
            'La Union': {
                name: 'La Union',
                cities: ['Agoo', 'Aringay', 'Bacnotan', 'Bagulin', 'Balaoan', 'Bangar', 'Bauang', 'Burgos', 'Caba', 'Luna', 'Naguilian', 'Pugo', 'Rosario', 'San Fernando City', 'San Gabriel', 'San Juan', 'Santo Tomas', 'Santol', 'Sudipen', 'Tubao']
            },
            'Pangasinan': {
                name: 'Pangasinan',
                cities: ['Agno', 'Aguilar', 'Alaminos City', 'Alcala', 'Anda', 'Asingan', 'Balungao', 'Bani', 'Basista', 'Bautista', 'Bayambang', 'Binalonan', 'Binmaley', 'Bolinao', 'Bugallon', 'Burgos', 'Calasiao', 'Dagupan City', 'Dasol', 'Infanta', 'Labrador', 'Laoac', 'Lingayen', 'Mabini', 'Malasiqui', 'Manaoag', 'Mangaldan', 'Mangatarem', 'Mapandan', 'Natividad', 'Pozorrubio', 'Rosales', 'San Carlos City', 'San Fabian', 'San Jacinto', 'San Manuel', 'San Nicolas', 'San Quintin', 'Santa Barbara', 'Santa Maria', 'Santo Tomas', 'Sison', 'Sual', 'Tayug', 'Umingan', 'Urbiztondo', 'Urdaneta City', 'Villasis']
            }
        }
    },
    'Region II': {
        name: 'Cagayan Valley (Region II)',
        provinces: {
            'Batanes': {
                name: 'Batanes',
                cities: ['Basco', 'Itbayat', 'Ivana', 'Mahatao', 'Sabtang', 'Uyugan']
            },
            'Cagayan': {
                name: 'Cagayan',
                cities: ['Abulug', 'Alcala', 'Allacapan', 'Amulung', 'Aparri', 'Baggao', 'Ballesteros', 'Buguey', 'Calayan', 'Camalaniugan', 'Claveria', 'Enrile', 'Gattaran', 'Gonzaga', 'Iguig', 'Lal-lo', 'Lasam', 'Pamplona', 'Peñablanca', 'Piat', 'Rizal', 'Sanchez-Mira', 'Santa Ana', 'Santa Praxedes', 'Santa Teresita', 'Santo Niño', 'Solana', 'Tuao', 'Tuguegarao City']
            },
            'Isabela': {
                name: 'Isabela',
                cities: ['Alicia', 'Angadanan', 'Aurora', 'Benito Soliven', 'Burgos', 'Cabagan', 'Cabatuan', 'City of Cauayan', 'Cordon', 'Delfin Albano', 'Dinapigue', 'Divilican', 'Echague', 'Gamu', 'Ilagan City', 'Jones', 'Luna', 'Maconacon', 'Mallig', 'Naguilian', 'Palanan', 'Quezon', 'Quirino', 'Ramon', 'Reina Mercedes', 'Roxas', 'San Agustin', 'San Guillermo', 'San Isidro', 'San Manuel', 'San Mariano', 'San Mateo', 'San Pablo', 'Santa Maria', 'Santiago City', 'Santo Tomas', 'Tumauini']
            },
            'Nueva Vizcaya': {
                name: 'Nueva Vizcaya',
                cities: ['Alfonso Castaneda', 'Ambaguio', 'Aritao', 'Bagabag', 'Bambang', 'Bayombong', 'Diadi', 'Dupax del Norte', 'Dupax del Sur', 'Kasibu', 'Kayapa', 'Quezon', 'Santa Fe', 'Solano', 'Villaverde']
            },
            'Quirino': {
                name: 'Quirino',
                cities: ['Aglipay', 'Cabarroguis', 'Diffun', 'Maddela', 'Nagtipunan', 'Saguday']
            }
        }
    },
    'Region III': {
        name: 'Central Luzon (Region III)',
        provinces: {
            'Aurora': {
                name: 'Aurora',
                cities: ['Baler', 'Casiguran', 'Dilasag', 'Dinalungan', 'Dingalan', 'Dipaculao', 'Maria Aurora', 'San Luis']
            },
            'Bataan': {
                name: 'Bataan',
                cities: ['Abucay', 'Bagac', 'Balanga City', 'Dinalupihan', 'Hermosa', 'Limay', 'Mariveles', 'Morong', 'Orani', 'Orion', 'Pilar', 'Samal']
            },
            'Bulacan': {
                name: 'Bulacan',
                cities: ['Angat', 'Balagtas', 'Baliuag', 'Bocaue', 'Bulakan', 'Bustos', 'Calumpit', 'Doña Remedios Trinidad', 'Guiguinto', 'Hagonoy', 'Malolos City', 'Marilao', 'Meycauayan City', 'Norzagaray', 'Obando', 'Pandi', 'Paombong', 'Plaridel', 'Pulilan', 'San Ildefonso', 'San Jose del Monte City', 'San Miguel', 'San Rafael', 'Santa Maria']
            },
            'Nueva Ecija': {
                name: 'Nueva Ecija',
                cities: ['Aliaga', 'Bongabon', 'Cabanatuan City', 'Cabiao', 'Carranglan', 'Cuyapo', 'Gabaldon', 'Gapan City', 'General Mamerto Natividad', 'General Tinio', 'Guimba', 'Jaen', 'Laur', 'Licab', 'Llanera', 'Lupao', 'Nampicuan', 'Palayan City', 'Pantabangan', 'Peñaranda', 'Quezon', 'Rizal', 'San Antonio', 'San Isidro', 'San Jose City', 'San Leonardo', 'Santa Rosa', 'Santo Domingo', 'Science City of Muñoz', 'Talavera', 'Talugtug', 'Zaragoza']
            },
            'Pampanga': {
                name: 'Pampanga',
                cities: ['Angeles City', 'Apalit', 'Arayat', 'Bacolor', 'Candaba', 'Floridablanca', 'Guagua', 'Lubao', 'Mabalacat City', 'Macabebe', 'Magalang', 'Masantol', 'Mexico', 'Minalin', 'Porac', 'San Fernando City', 'San Luis', 'San Simon', 'Santa Ana', 'Santa Rita', 'Santo Tomas', 'Sasmuan']
            },
            'Tarlac': {
                name: 'Tarlac',
                cities: ['Anao', 'Bamban', 'Camiling', 'Capas', 'Concepcion', 'Gerona', 'La Paz', 'Mayantoc', 'Moncada', 'Paniqui', 'Pura', 'Ramos', 'San Clemente', 'San Jose', 'San Manuel', 'Santa Ignacia', 'Tarlac City', 'Victoria']
            },
            'Zambales': {
                name: 'Zambales',
                cities: ['Botolan', 'Cabangan', 'Candelaria', 'Castillejos', 'Iba', 'Masinloc', 'Olongapo City', 'Palauig', 'San Antonio', 'San Felipe', 'San Marcelino', 'San Narciso', 'Santa Cruz', 'Subic']
            }
        }
    },
    'Region IV-A': {
        name: 'CALABARZON (Region IV-A)',
        provinces: {
            'Batangas': {
                name: 'Batangas',
                cities: ['Agoncillo', 'Alitagtag', 'Balayan', 'Balete', 'Batangas City', 'Bauan', 'Calaca', 'Calatagan', 'Cuenca', 'Ibaan', 'Laurel', 'Lemery', 'Lian', 'Lipa City', 'Lobo', 'Mabini', 'Malvar', 'Mataas na Kahoy', 'Nasugbu', 'Padre Garcia', 'Rosario', 'San Jose', 'San Juan', 'San Luis', 'San Nicolas', 'San Pascual', 'Santa Teresita', 'Santo Tomas', 'Taal', 'Talisay', 'Tanauan City', 'Taysan', 'Tingloy', 'Tuy']
            },
            'Cavite': {
                name: 'Cavite',
                cities: ['Alfonso', 'Amadeo', 'Bacoor City', 'Carmona', 'Cavite City', 'Dasmariñas City', 'General Emilio Aguinaldo', 'General Mariano Alvarez', 'General Trias', 'Imus City', 'Indang', 'Kawit', 'Magallanes', 'Maragondon', 'Mendez', 'Naic', 'Noveleta', 'Rosario', 'Silang', 'Tagaytay City', 'Tanza', 'Ternate', 'Trece Martires City']
            },
            'Laguna': {
                name: 'Laguna',
                cities: ['Alaminos', 'Bay', 'Biñan City', 'Cabuyao City', 'Calamba City', 'Calauan', 'Cavinti', 'Famy', 'Kalayaan', 'Liliw', 'Los Baños', 'Luisiana', 'Lumban', 'Mabitac', 'Magdalena', 'Majayjay', 'Nagcarlan', 'Paete', 'Pagsanjan', 'Pakil', 'Pangil', 'Pila', 'Rizal', 'San Pablo City', 'San Pedro City', 'Santa Cruz', 'Santa Maria', 'Santa Rosa City', 'Siniloan', 'Victoria']
            },
            'Quezon': {
                name: 'Quezon',
                cities: ['Agdangan', 'Alabat', 'Atimonan', 'Buenavista', 'Burdeos', 'Calauag', 'Candelaria', 'Catanauan', 'Dolores', 'General Luna', 'General Nakar', 'Guinayangan', 'Gumaca', 'Infanta', 'Jomalig', 'Lopez', 'Lucban', 'Lucena City', 'Macalelon', 'Mauban', 'Mulanay', 'Padre Burgos', 'Pagbilao', 'Panukulan', 'Patnanungan', 'Perez', 'Pitogo', 'Plaridel', 'Polillo', 'Quezon', 'Real', 'Sampaloc', 'San Andres', 'San Antonio', 'San Francisco', 'San Narciso', 'Sariaya', 'Tagkawayan', 'Tayabas City', 'Tiaong', 'Unisan']
            },
            'Rizal': {
                name: 'Rizal',
                cities: ['Angono', 'Antipolo City', 'Baras', 'Binangonan', 'Cainta', 'Cardona', 'Jalajala', 'Morong', 'Pililla', 'Rodriguez', 'San Mateo', 'Tanay', 'Taytay', 'Teresa']
            }
        }
    },
    'MIMAROPA': {
        name: 'MIMAROPA (Region IV-B)',
        provinces: {
            'Marinduque': {
                name: 'Marinduque',
                cities: ['Boac', 'Buenavista', 'Gasan', 'Mogpog', 'Santa Cruz', 'Torrijos']
            },
            'Occidental Mindoro': {
                name: 'Occidental Mindoro',
                cities: ['Abra de Ilog', 'Calintaan', 'Looc', 'Lubang', 'Magsaysay', 'Mamburao', 'Paluan', 'Rizal', 'Sablayan', 'San Jose', 'Santa Cruz']
            },
            'Oriental Mindoro': {
                name: 'Oriental Mindoro',
                cities: ['Baco', 'Bansud', 'Bongabong', 'Bulalacao', 'Calapan City', 'Gloria', 'Mansalay', 'Naujan', 'Pinamalayan', 'Pola', 'Puerto Galera', 'Roxas', 'San Teodoro', 'Socorro', 'Victoria']
            },
            'Palawan': {
                name: 'Palawan',
                cities: ['Aborlan', 'Agutaya', 'Araceli', 'Balabac', 'Bataraza', 'Brooke\'s Point', 'Busuanga', 'Cagayancillo', 'Coron', 'Culion', 'Cuyo', 'Dumaran', 'El Nido', 'Kalayaan', 'Linapacan', 'Magsaysay', 'Narra', 'Puerto Princesa City', 'Quezon', 'Rizal', 'Roxas', 'San Vicente', 'Sofronio Española', 'Taytay']
            },
            'Romblon': {
                name: 'Romblon',
                cities: ['Alcantara', 'Banton', 'Cajidiocan', 'Calatrava', 'Concepcion', 'Corcuera', 'Ferrol', 'Looc', 'Magdiwang', 'Odiongan', 'Romblon', 'San Agustin', 'San Andres', 'San Fernando', 'San Jose', 'Santa Fe', 'Santa Maria']
            }
        }
    },
    'Region V': {
        name: 'Bicol Region (Region V)',
        provinces: {
            'Albay': {
                name: 'Albay',
                cities: ['Bacacay', 'Camalig', 'Daraga', 'Guinobatan', 'Jovellar', 'Legazpi City', 'Libon', 'Ligao City', 'Malilipot', 'Malinao', 'Manito', 'Oas', 'Pio Duran', 'Polangui', 'Rapu-Rapu', 'Santo Domingo', 'Tabaco City', 'Tiwi']
            },
            'Camarines Norte': {
                name: 'Camarines Norte',
                cities: ['Basud', 'Capalonga', 'Daet', 'Jose Panganiban', 'Labo', 'Mercedes', 'Paracale', 'San Lorenzo Ruiz', 'San Vicente', 'Santa Elena', 'Talisay', 'Vinzons']
            },
            'Camarines Sur': {
                name: 'Camarines Sur',
                cities: ['Baao', 'Balatan', 'Bato', 'Bombon', 'Buhi', 'Bula', 'Cabusao', 'Calabanga', 'Camaligan', 'Canaman', 'Caramoan', 'Del Gallego', 'Gainza', 'Garchitorena', 'Goa', 'Iriga City', 'Lagonoy', 'Libmanan', 'Lupi', 'Magarao', 'Milaor', 'Minalabac', 'Nabua', 'Naga City', 'Ocampo', 'Pamplona', 'Pasacao', 'Pili', 'Presentacion', 'Ragay', 'Sagñay', 'San Fernando', 'San Jose', 'Sipocot', 'Siruma', 'Tigaon', 'Tinambac']
            },
            'Catanduanes': {
                name: 'Catanduanes',
                cities: ['Bagamanoc', 'Baras', 'Bato', 'Caramoran', 'Gigmoto', 'Pandan', 'Panganiban', 'San Andres', 'San Miguel', 'Viga', 'Virac']
            },
            'Masbate': {
                name: 'Masbate',
                cities: ['Aroroy', 'Baleno', 'Balud', 'Batuan', 'Cataingan', 'Cawayan', 'Claveria', 'Dimasalang', 'Esperanza', 'Mandaon', 'Masbate City', 'Milagros', 'Mobo', 'Monreal', 'Palanas', 'Pio V. Corpuz', 'Placer', 'San Fernando', 'San Jacinto', 'San Pascual', 'Uson']
            },
            'Sorsogon': {
                name: 'Sorsogon',
                cities: ['Barcelona', 'Bulan', 'Bulusan', 'Casiguran', 'Castilla', 'Donsol', 'Gubat', 'Irosin', 'Juban', 'Magallanes', 'Matnog', 'Pilar', 'Prieto Diaz', 'Santa Magdalena', 'Sorsogon City']
            }
        }
    },
    'Region VI': {
        name: 'Western Visayas (Region VI)',
        provinces: {
            'Aklan': {
                name: 'Aklan',
                cities: ['Altavas', 'Balete', 'Banga', 'Batan', 'Buruanga', 'Ibajay', 'Kalibo', 'Lezo', 'Libacao', 'Madalag', 'Makato', 'Malay', 'Malinao', 'Nabas', 'New Washington', 'Numancia', 'Tangalan']
            },
            'Antique': {
                name: 'Antique',
                cities: ['Anini-y', 'Barbaza', 'Belison', 'Bugasong', 'Caluya', 'Culasi', 'Hamtic', 'Lal-lo', 'Libertad', 'Pandan', 'Patnongon', 'San Jose de Buenavista', 'San Remigio', 'Sebaste', 'Sibalom', 'Tibiao', 'Tobias Fornier', 'Valderrama']
            },
            'Capiz': {
                name: 'Capiz',
                cities: ['Cuartero', 'Dao', 'Dumalag', 'Dumarao', 'Ivisan', 'Jamindan', 'Maayon', 'Mambusao', 'Panay', 'Panitan', 'Pilar', 'Pontevedra', 'President Roxas', 'Roxas City', 'Sapi-an', 'Sigma', 'Tapaz']
            },
            'Guimaras': {
                name: 'Guimaras',
                cities: ['Buenavista', 'Jordan', 'Nueva Valencia', 'San Lorenzo', 'Sibunag']
            },
            'Iloilo': {
                name: 'Iloilo',
                cities: ['Ajuy', 'Alimodian', 'Anilao', 'Badiangan', 'Balasan', 'Banate', 'Barotac Nuevo', 'Barotac Viejo', 'Batad', 'Bingawan', 'Cabatuan', 'Calinog', 'Carles', 'Concepcion', 'Dingle', 'Dueñas', 'Dumangas', 'Estancia', 'Guimbal', 'Igbaras', 'Iloilo City', 'Janiuay', 'Lambunao', 'Leganes', 'Lemery', 'Leon', 'Maasin', 'Miagao', 'Mina', 'New Lucena', 'Oton', 'Passi City', 'Pavia', 'Pototan', 'San Dionisio', 'San Enrique', 'San Joaquin', 'San Miguel', 'San Rafael', 'Santa Barbara', 'Sara', 'Tigbauan', 'Tubungan', 'Zarraga']
            },
            'Negros Occidental': {
                name: 'Negros Occidental',
                cities: ['Bacolod City', 'Bago City', 'Binalbagan', 'Cadiz City', 'Calatrava', 'Candoni', 'Cauayan', 'Enrique B. Magalona', 'Escalante City', 'Himamaylan City', 'Hinigaran', 'Hinoba-an', 'Ilog', 'Isabela', 'Kabankalan City', 'La Carlota City', 'La Castellana', 'Manapla', 'Moises Padilla', 'Murcia', 'Pontevedra', 'Pulupandan', 'Sagay City', 'Salvador Benedicto', 'San Carlos City', 'San Enrique', 'Silay City', 'Sipalay City', 'Talisay City', 'Toboso', 'Valladolid', 'Victorias City']
            }
        }
    },
    'Region VII': {
        name: 'Central Visayas (Region VII)',
        provinces: {
            'Bohol': {
                name: 'Bohol',
                cities: ['Alburquerque', 'Alicia', 'Anda', 'Antequera', 'Baclayon', 'Balilihan', 'Batuan', 'Bien Unido', 'Bilar', 'Buenavista', 'Calape', 'Candijay', 'Carmen', 'Catigbian', 'Clarin', 'Corella', 'Cortes', 'Dagohoy', 'Danao', 'Dauis', 'Dimiao', 'Duero', 'Garcia Hernandez', 'Guindulman', 'Inabanga', 'Jagna', 'Jetafe', 'Lila', 'Loay', 'Loboc', 'Loon', 'Mabini', 'Maribojoc', 'Panglao', 'Pilar', 'President Carlos P. Garcia', 'Sagbayan', 'San Isidro', 'San Miguel', 'Sevilla', 'Sierra Bullones', 'Sikatuna', 'Tagbilaran City', 'Talibon', 'Trinidad', 'Tubigon', 'Ubay', 'Valencia']
            },
            'Cebu': {
                name: 'Cebu',
                cities: ['Alcantara', 'Alcoy', 'Alegria', 'Aloguinsan', 'Argao', 'Asturias', 'Badian', 'Balamban', 'Bantayan', 'Barili', 'Bogo City', 'Boljoon', 'Borbon', 'Carcar City', 'Carmen', 'Catmon', 'Cebu City', 'Compostela', 'Consolacion', 'Cordova', 'Daanbantayan', 'Dalaguete', 'Danao City', 'Dumanjug', 'Ginatilan', 'Lapu-Lapu City', 'Liloan', 'Madridejos', 'Malabuyoc', 'Mandaue City', 'Medellin', 'Minglanilla', 'Moalboal', 'Naga City', 'Oslob', 'Pilar', 'Pinamungajan', 'Poro', 'Ronda', 'Samboan', 'San Fernando', 'San Francisco', 'San Remigio', 'Santa Fe', 'Santander', 'Sibonga', 'Sogod', 'Tabogon', 'Tabuelan', 'Talisay City', 'Toledo City', 'Tuburan', 'Tudela']
            },
            'Negros Oriental': {
                name: 'Negros Oriental',
                cities: ['Amlan', 'Ayungon', 'Bacong', 'Bais City', 'Basay', 'Bayawan City', 'Bindoy', 'Canlaon City', 'Dauin', 'Dumaguete City', 'Guihulngan City', 'Jimalalud', 'La Libertad', 'Mabinay', 'Manjuyod', 'Pamplona', 'San Jose', 'Santa Catalina', 'Siaton', 'Sibulan', 'Tanjay City', 'Tayasan', 'Valencia', 'Vallehermoso', 'Zamboanguita']
            },
            'Siquijor': {
                name: 'Siquijor',
                cities: ['Enrique Villanueva', 'Larena', 'Lazi', 'Maria', 'San Juan', 'Siquijor']
            }
        }
    },
    'Region VIII': {
        name: 'Eastern Visayas (Region VIII)',
        provinces: {
            'Biliran': {
                name: 'Biliran',
                cities: ['Almeria', 'Biliran', 'Cabucgayan', 'Caibiran', 'Culaba', 'Kawayan', 'Maripipi', 'Naval']
            },
            'Eastern Samar': {
                name: 'Eastern Samar',
                cities: ['Arteche', 'Balangiga', 'Balangkayan', 'Borongan City', 'Can-avid', 'Dolores', 'General MacArthur', 'Giporlos', 'Guiuan', 'Hernani', 'Jipapad', 'Lawaan', 'Llorente', 'Maslog', 'Maydolong', 'Mercedes', 'Oras', 'Quinapondan', 'Salcedo', 'San Julian', 'San Policarpo', 'Sulat', 'Taft']
            },
            'Leyte': {
                name: 'Leyte',
                cities: ['Abuyog', 'Alangalang', 'Albuera', 'Babatngon', 'Barugo', 'Bato', 'Baybay City', 'Burauen', 'Calubian', 'Capoocan', 'Carigara', 'Dagami', 'Dulag', 'Hilongos', 'Hindang', 'Inopacan', 'Isabel', 'Jaro', 'Javier', 'Julita', 'Kananga', 'La Paz', 'Leyte', 'MacArthur', 'Mahaplag', 'Matag-ob', 'Matalom', 'Mayorga', 'Merida', 'Ormoc City', 'Palo', 'Palompon', 'Pastrana', 'San Isidro', 'San Miguel', 'Santa Fe', 'Tabango', 'Tabontabon', 'Tanauan', 'Tolosa', 'Tunga', 'Villaba']
            },
            'Northern Samar': {
                name: 'Northern Samar',
                cities: ['Allen', 'Biri', 'Bobon', 'Capul', 'Catarman', 'Catubig', 'Gamay', 'Laoang', 'Lapinig', 'Las Navas', 'Lavezares', 'Lope de Vega', 'Mapanas', 'Mondragon', 'Palapag', 'Pambujan', 'Rosario', 'San Antonio', 'San Isidro', 'San Jose', 'San Roque', 'San Vicente', 'Silvino Lobos', 'Victoria']
            },
            'Samar': {
                name: 'Samar',
                cities: ['Almagro', 'Basey', 'Calbayog City', 'Calbiga', 'Catbalogan City', 'Daram', 'Gandara', 'Hinabangan', 'Jiabong', 'Marabut', 'Matuguinao', 'Motiong', 'Paranas', 'Pinabacdao', 'San Jorge', 'San Jose de Buan', 'San Sebastian', 'Santa Margarita', 'Santa Rita', 'Santo Niño', 'Tagapul-an', 'Talalora', 'Tarangnan', 'Villareal', 'Zumarraga']
            },
            'Southern Leyte': {
                name: 'Southern Leyte',
                cities: ['Anahawan', 'Bontoc', 'Hinunangan', 'Hinundayan', 'Libagon', 'Liloan', 'Limasawa', 'Maasin City', 'Macrohon', 'Malitbog', 'Padre Burgos', 'Pintuyan', 'Saint Bernard', 'San Francisco', 'San Juan', 'San Ricardo', 'Silago', 'Sogod', 'Tomas Oppus']
            }
        }
    },
    'Region IX': {
        name: 'Zamboanga Peninsula (Region IX)',
        provinces: {
            'Zamboanga del Norte': {
                name: 'Zamboanga del Norte',
                cities: ['Baliguian', 'Dapitan City', 'Dipolog City', 'Godod', 'Gutalac', 'Jose Dalman', 'Kalawit', 'Katipunan', 'La Libertad', 'Labason', 'Liloy', 'Manukan', 'Mutia', 'Piñan', 'Polanco', 'President Manuel A. Roxas', 'Rizal', 'Salug', 'Sergio Osmeña Sr.', 'Siayan', 'Sibuco', 'Sibutad', 'Sindangan', 'Siocon', 'Sirawai', 'Tampilisan']
            },
            'Zamboanga del Sur': {
                name: 'Zamboanga del Sur',
                cities: ['Aurora', 'Bayog', 'Dimataling', 'Dinas', 'Dumalinao', 'Dumingag', 'Guipos', 'Josefina', 'Kumalarang', 'Labangan', 'Lakewood', 'Lapuyan', 'Mahayag', 'Margosatubig', 'Midsalip', 'Molave', 'Pagadian City', 'Pitogo', 'Ramon Magsaysay', 'San Miguel', 'San Pablo', 'Sominot', 'Tabina', 'Tambulig', 'Tigbao', 'Tukuran', 'Vincenzo A. Sagun', 'Zamboanga City']
            },
            'Zamboanga Sibugay': {
                name: 'Zamboanga Sibugay',
                cities: ['Alicia', 'Buug', 'Diplahan', 'Imelda', 'Ipil', 'Kabasalan', 'Mabuhay', 'Malangas', 'Naga', 'Olutanga', 'Payao', 'Roseller Lim', 'Siay', 'Talusan', 'Titay', 'Tungawan']
            }
        }
    },
    'Region X': {
        name: 'Northern Mindanao (Region X)',
        provinces: {
            'Bukidnon': {
                name: 'Bukidnon',
                cities: ['Baungon', 'Cabanglasan', 'Damulog', 'Dangcagan', 'Don Carlos', 'Impasugong', 'Kadingilan', 'Kalilangan', 'Kibawe', 'Kitaotao', 'Lantapan', 'Libona', 'Malaybalay City', 'Malitbog', 'Manolo Fortich', 'Maramag', 'Pangantucan', 'Quezon', 'San Fernando', 'Sumilao', 'Talakag', 'Valencia City']
            },
            'Camiguin': {
                name: 'Camiguin',
                cities: ['Catarman', 'Guinsiliban', 'Mahinog', 'Mambajao', 'Sagay']
            },
            'Lanao del Norte': {
                name: 'Lanao del Norte',
                cities: ['Bacolod', 'Baloi', 'Baroy', 'Iligan City', 'Kapatagan', 'Kauswagan', 'Kolambugan', 'Lala', 'Linamon', 'Magsaysay', 'Maigo', 'Matungao', 'Munai', 'Nunungan', 'Pantao Ragat', 'Pantar', 'Poona Piagapo', 'Salvador', 'Sapad', 'Sultan Naga Dimaporo', 'Tagoloan', 'Tangcal', 'Tubod']
            },
            'Misamis Occidental': {
                name: 'Misamis Occidental',
                cities: ['Aloran', 'Baliangao', 'Bonifacio', 'Calamba', 'Clarin', 'Concepcion', 'Don Victoriano Chiongbian', 'Jimenez', 'Lopez Jaena', 'Oroquieta City', 'Ozamiz City', 'Panaon', 'Plaridel', 'Sapang Dalaga', 'Sinacaban', 'Tangub City', 'Tudela']
            },
            'Misamis Oriental': {
                name: 'Misamis Oriental',
                cities: ['Alubijid', 'Balingasag', 'Balingoan', 'Binuangan', 'Cagayan de Oro City', 'Claveria', 'El Salvador City', 'Gingoog City', 'Gitagum', 'Initao', 'Jasaan', 'Kinoguitan', 'Lagonglong', 'Laguindingan', 'Libertad', 'Lugait', 'Magsaysay', 'Manticao', 'Medina', 'Naawan', 'Opol', 'Salay', 'Sugbongcogon', 'Tagoloan', 'Talisayan', 'Villanueva']
            }
        }
    },
    'Region XI': {
        name: 'Davao Region (Region XI)',
        provinces: {
            'Davao de Oro': {
                name: 'Davao de Oro',
                cities: ['Compostela', 'Laak', 'Mabini', 'Maco', 'Maragusan', 'Mawab', 'Monkayo', 'Montevista', 'Nabunturan', 'New Bataan', 'Pantukan']
            },
            'Davao del Norte': {
                name: 'Davao del Norte',
                cities: ['Asuncion', 'Braulio E. Dujali', 'Carmen', 'Kapalong', 'New Corella', 'Panabo City', 'Samal City', 'San Isidro', 'Santo Tomas', 'Tagum City', 'Talaingod']
            },
            'Davao del Sur': {
                name: 'Davao del Sur',
                cities: ['Bansalan', 'Davao City', 'Digos City', 'Hagonoy', 'Kiblawan', 'Magsaysay', 'Malalag', 'Matanao', 'Padada', 'Santa Cruz', 'Sulop']
            },
            'Davao Occidental': {
                name: 'Davao Occidental',
                cities: ['Don Marcelino', 'Jose Abad Santos', 'Malita', 'Santa Maria', 'Sarangani']
            },
            'Davao Oriental': {
                name: 'Davao Oriental',
                cities: ['Baganga', 'Banaybanay', 'Boston', 'Caraga', 'Cateel', 'Governor Generoso', 'Lupon', 'Manay', 'Mati City', 'San Isidro', 'Tarragona']
            }
        }
    },
    'Region XII': {
        name: 'SOCCSKSARGEN (Region XII)',
        provinces: {
            'Cotabato': {
                name: 'Cotabato',
                cities: ['Alamada', 'Aleosan', 'Antipas', 'Arakan', 'Banisilan', 'Carmen', 'Kabacan', 'Kidapawan City', 'Libungan', 'M\'lang', 'Magpet', 'Makilala', 'Matalam', 'Midsayap', 'Pigkawayan', 'Pikit', 'President Roxas', 'Tulunan']
            },
            'Sarangani': {
                name: 'Sarangani',
                cities: ['Alabel', 'Glan', 'Kiamba', 'Maasim', 'Maitum', 'Malapatan', 'Malungon']
            },
            'South Cotabato': {
                name: 'South Cotabato',
                cities: ['Banga', 'General Santos City', 'Koronadal City', 'Lake Sebu', 'Norala', 'Polomolok', 'Santo Niño', 'Surallah', 'T\'Boli', 'Tampakan', 'Tantangan', 'Tupi']
            },
            'Sultan Kudarat': {
                name: 'Sultan Kudarat',
                cities: ['Bagumbayan', 'Columbio', 'Esperanza', 'Isulan', 'Kalamansig', 'Lambayong', 'Lebak', 'Lutayan', 'Palimbang', 'President Quirino', 'Senator Ninoy Aquino', 'Tacurong City']
            }
        }
    },
    'Region XIII': {
        name: 'Caraga (Region XIII)',
        provinces: {
            'Agusan del Norte': {
                name: 'Agusan del Norte',
                cities: ['Buenavista', 'Butuan City', 'Cabadbaran City', 'Carmen', 'Jabonga', 'Kitcharao', 'Las Nieves', 'Magallanes', 'Nasipit', 'Remedios T. Romualdez', 'Santiago', 'Tubay']
            },
            'Agusan del Sur': {
                name: 'Agusan del Sur',
                cities: ['Bayugan City', 'Bunawan', 'Esperanza', 'La Paz', 'Loreto', 'Prosperidad', 'Rosario', 'San Francisco', 'San Luis', 'Santa Josefa', 'Sibagat', 'Talacogon', 'Trento', 'Veruela']
            },
            'Dinagat Islands': {
                name: 'Dinagat Islands',
                cities: ['Basilisa', 'Cagdianao', 'Dinagat', 'Libjo', 'Loreto', 'San Jose', 'Tubajon']
            },
            'Surigao del Norte': {
                name: 'Surigao del Norte',
                cities: ['Alegria', 'Bacuag', 'Burgos', 'Claver', 'Dapa', 'Del Carmen', 'General Luna', 'Gigaquit', 'Mainit', 'Malimono', 'Pilar', 'Placer', 'San Benito', 'San Francisco', 'San Isidro', 'Santa Monica', 'Sison', 'Socorro', 'Surigao City', 'Tagana-an', 'Tubod']
            },
            'Surigao del Sur': {
                name: 'Surigao del Sur',
                cities: ['Barobo', 'Bayabas', 'Bislig City', 'Cagwait', 'Cantilan', 'Carmen', 'Carrascal', 'Cortes', 'Hinatuan', 'Lanuza', 'Lianga', 'Lingig', 'Madrid', 'Marihatag', 'San Agustin', 'San Miguel', 'Tagbina', 'Tago', 'Tandag City']
            }
        }
    },
    'BARMM': {
        name: 'Bangsamoro Autonomous Region in Muslim Mindanao (BARMM)',
        provinces: {
            'Basilan': {
                name: 'Basilan',
                cities: ['Akbar', 'Al-Barka', 'Hadji Mohammad Ajul', 'Hadji Muhtamad', 'Isabela City', 'Lamitan City', 'Lantawan', 'Maluso', 'Sumisip', 'Tabuan-Lasa', 'Tipo-Tipo', 'Tuburan', 'Ungkaya Pukan']
            },
            'Lanao del Sur': {
                name: 'Lanao del Sur',
                cities: ['Amai Manabilang', 'Bacolod-Kalawi', 'Balabagan', 'Balindong', 'Bayang', 'Binidayan', 'Buadiposo-Buntong', 'Bubong', 'Bumbaran', 'Butig', 'Calanogas', 'Ditsaan-Ramain', 'Ganassi', 'Kapai', 'Kapatagan', 'Lumba-Bayabao', 'Lumbaca-Unayan', 'Lumbatan', 'Lumbayanague', 'Madalum', 'Madamba', 'Maguing', 'Malabang', 'Marantao', 'Marawi City', 'Marogong', 'Masiu', 'Mulondo', 'Pagayawan', 'Piagapo', 'Picong', 'Poona Bayabao', 'Pualas', 'Saguiaran', 'Sultan Dumalondong', 'Tagoloan II', 'Tamparan', 'Taraka', 'Tubaran', 'Tugaya', 'Wao']
            },
            'Maguindanao del Norte': {
                name: 'Maguindanao del Norte',
                cities: ['Barira', 'Buldon', 'Datu Blah T. Sinsuat', 'Datu Odin Sinsuat', 'Kabuntalan', 'Matanog', 'Northern Kabuntalan', 'Parang', 'Sultan Kudarat', 'Sultan Mastura', 'Talitay']
            },
            'Maguindanao del Sur': {
                name: 'Maguindanao del Sur',
                cities: ['Ampatuan', 'Buluan', 'Datu Abdullah Sangki', 'Datu Anggal Midtimbang', 'Datu Hoffer Ampatuan', 'Datu Montawal', 'Datu Paglas', 'Datu Piang', 'Datu Salibo', 'Datu Saudi-Ampatuan', 'Datu Unsay', 'Gen. S. K. Pendatun', 'Guindulungan', 'Mamasapano', 'Mangudadatu', 'Pagalungan', 'Pandag', 'Paglat', 'Rajah Buayan', 'Shariff Aguak', 'Shariff Saydona Mustapha', 'South Upi', 'Sultan sa Barongis', 'Talayan', 'Upi']
            },
            'Sulu': {
                name: 'Sulu',
                cities: ['Banguingui', 'Hadji Panglima Tahil', 'Indanan', 'Jolo', 'Kalingalan Caluang', 'Lugus', 'Luuk', 'Maimbung', 'Old Panamao', 'Omar', 'Pandami', 'Panglima Estino', 'Pangutaran', 'Parang', 'Pata', 'Patikul', 'Siasi', 'Talipao', 'Tapul']
            },
            'Tawi-Tawi': {
                name: 'Tawi-Tawi',
                cities: ['Bongao', 'Languyan', 'Mapun', 'Panglima Sugala', 'Sapa-Sapa', 'Sibutu', 'Simunul', 'Sitangkai', 'South Ubian', 'Tandubas', 'Turtle Islands']
            }
        }
    }
};

// Export for use in other scripts
if (typeof module !== 'undefined' && module.exports) {
    module.exports = philippineAddressData;
}
