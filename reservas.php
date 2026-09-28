<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-es="Club Social Royal Palm Sampaka - Reservas" data-en="Royal Palm Sampaka Social Club - Reservations" data-fr="Club Social Royal Palm Sampaka - Réservations">Club Social Royal Palm Sampaka - Reservas</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/scripts.js" defer></script>
    <style>
        :root {
            --primary: linear-gradient(135deg, #ffffff, #f8f9fa);
            --accent: #93d8c7ff;
            --secondary: #f5f5f5;
            --text: #333;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            --border-color: #ccc;
            --highlight: #578f5aff;
            --hover-color: #e76f51;
        }

        body {
            background: var(--primary);
            color: var(--text);
            font-family: 'Montserrat', sans-serif;
        }

        .welcome-section {
            max-width: 1200px;
            margin: 40px auto;
            padding: 40px;
            background: var(--primary-color);
            border-radius: 15px;
            box-shadow: var(--shadow);
            text-align: center;
        }

        .welcome-section h1 {
            color: var(--accent);
            font-size: 2.5em;
            margin-bottom: 20px;
            animation: fadeInUp 1s ease;
        }

        .welcome-section p {
            font-size: 1.2em;
            color: #555;
            max-width: 800px;
            margin: 0 auto;
        }

        .places-section {
            max-width: 1200px;
            margin: 40px auto;
            padding: 40px;
            background: var(--primary-color);
            border-radius: 15px;
            box-shadow: var(--shadow);
        }

        .places-section h2 {
            color: var(--accent);
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
            background: var(--primary-gradient);
            padding: 12px;
            border-radius: 12px;
        }

        .places-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .place-card {
            background: var(--secondary);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .place-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }

        .place-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 3px solid var(--highlight);
        }

        .place-card h3 {
            font-size: 1.5em;
            margin: 10px;
            color: var(--accent);
        }

        .place-card p {
            font-size: 1em;
            color: #555;
            margin-bottom: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal-content {
            background: var(--primary-color);
            padding: 30px;
            border-radius: 15px;
            max-width: 700px;
            width: 90%;
            position: relative;
            box-shadow: var(--shadow);
            animation: slideIn 0.3s ease;
            max-height: 80vh;
            overflow-y: auto;
        }

        .modal-drag-handle {
            background: var(--accent);
            color: white;
            padding: 10px;
            text-align: center;
            cursor: move;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            font-weight: bold;
            user-select: none;
        }

        .modal-close {
            position: absolute;
            top: 15px;
            right: 15px;
            cursor: pointer;
            font-size: 2em;
            color: var(--accent);
            background: var(--primary-gradient);
            padding: 5px 10px;
            border-radius: 50%;
            transition: transform 0.3s ease;
        }

        .modal-close:hover {
            transform: rotate(90deg);
        }

        .reservation-form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .reservation-form label {
            font-weight: bold;
            color: var(--accent);
            margin-bottom: 5px;
        }

        .reservation-form input,
        .reservation-form select,
        .reservation-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }

        .reservation-form input:focus,
        .reservation-form select:focus,
        .reservation-form textarea:focus {
            border-color: var(--highlight);
            outline: none;
        }

        .reservation-form textarea {
            resize: vertical;
            min-height: 100px;
            grid-column: span 2;
        }

        .reservation-form button {
            background: var(--accent);
            color: var(--primary-color);
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background 0.3s ease, transform 0.3s ease;
            grid-column: span 2;
        }

        .reservation-form button:hover {
            background: #2c5a4f;
            transform: translateY(-2px);
        }

        .reservation-form button:disabled {
            background: #ccc;
            cursor: not-allowed;
        }

        .price-info, .total-price {
            font-size: 1.2em;
            color: var(--accent);
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
            grid-column: span 2;
        }

        .confirmation-message, .error-message {
            display: none;
            font-size: 1.2em;
            margin-top: 20px;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            grid-column: span 2;
        }

        .confirmation-message {
            color: #28a745;
            background: #e6ffe6;
        }

        .error-message {
            color: #367549ff;
            background: #ffe6e6;
        }

        .gallery-section {
            max-width: 1200px;
            margin: 40px auto;
            padding: 40px;
            background: var(--primary-color);
            border-radius: 15px;
            box-shadow: var(--shadow);
        }

        .gallery-section h2 {
            color: var(--accent);
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
            background: var(--primary-gradient);
            padding: 12px;
            border-radius: 12px;
        }

        .gallery-carousel {
            position: relative;
            overflow: hidden;
        }

        .gallery-grid {
            display: flex;
            transition: transform 0.5s ease;
        }

        .gallery-card {
            background: var(--secondary);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
            flex: 0 0 100%;
        }

        .gallery-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 3px solid var(--highlight);
        }

        .gallery-card h3 {
            font-size: 1.2em;
            margin: 10px;
            color: var(--accent);
        }

        .gallery-card p {
            font-size: 0.95em;
            margin: 0 10px 15px;
            color: #555;
        }

        .carousel-controls {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .carousel-controls button {
            background: var(--accent);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            transition: background 0.3s ease;
        }

        .carousel-controls button:hover {
            background: #2c5a4f;
        }

        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @media (max-width: 768px) {
            .welcome-section, .places-section, .gallery-section {
                padding: 20px;
                margin: 20px;
            }

            .modal-content {
                width: 95%;
                padding: 20px;
                max-height: 90vh;
                overflow-y: auto;
            }

            .reservation-form {
                grid-template-columns: 1fr;
            }

            .welcome-section h1 {
                font-size: 2em;
            }

            .places-section h2, .gallery-section h2 {
                font-size: 1.5em;
            }
        }

        @media (max-width: 480px) {
            .reservation-form input,
            .reservation-form select,
            .reservation-form textarea {
                font-size: 0.9em;
            }

            .reservation-form button {
                font-size: 0.9em;
            }

            .place-card h3, .gallery-card h3 {
                font-size: 1.2em;
            }

            .price-info, .total-price {
                font-size: 1em;
            }

            .modal-content {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>
    <main>
        <section class="welcome-section animate__animated animate__fadeIn">
            <h1 data-es="Bienvenidos a la Sección de Reservas" data-en="Welcome to the Reservations Section" data-fr="Bienvenue à la Section des Réservations">Bienvenidos a la Sección de Reservas</h1>
            <p data-es="En el Club Social Royal Palm Sampaka, podrás reservar espacios para eventos personales como reuniones privadas, fiestas, bautizos, comuniones, cumpleaños o eventos privados para empresas." data-en="At Royal Palm Sampaka Social Club, you can reserve spaces for personal events such as private meetings, parties, baptisms, communions, birthdays, or private company events." data-fr="Au Club Social Royal Palm Sampaka, vous pouvez réserver des espaces pour des événements personnels tels que des réunions privées, fêtes, baptêmes, communions, anniversaires ou événements privés pour entreprises.">En el Club Social Royal Palm Sampaka, podrás reservar espacios para eventos personales como reuniones privadas, fiestas, bautizos, comuniones, cumpleaños o eventos privados para empresas.</p>
        </section>

        <section class="places-section">
            <h2 data-es="Lugares Disponibles para Reservar" data-en="Available Places for Reservation" data-fr="Lieux Disponibles pour Réservation">Lugares Disponibles para Reservar</h2>
            <div class="places-grid">
                <div class="place-card" data-modal="piscinaModal">
                    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb" alt="Piscina" data-src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb">
                    <h3 data-es="Piscina" data-en="Pool" data-fr="Piscine">Piscina</h3>
                    <p data-es="Reserva un lugar en la piscina" data-en="Reserve a spot in the pool" data-fr="Réservez un endroit dans la piscine">Reserva un lugar en la piscina</p>
                </div>
                <div class="place-card" data-modal="cafeteriaModal">
                    <img src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085" alt="Cafetería" data-src="https://images.unsplash.com/photo-1495474472287-4d71bcdd2085">
                    <h3 data-es="Cafetería" data-en="Cafeteria" data-fr="Cafétéria">Cafetería</h3>
                    <p data-es="Reserva un lugar en la cafetería" data-en="Reserve a spot in the cafeteria" data-fr="Réservez un endroit dans la cafétéria">Reserva un lugar en la cafetería</p>
                </div>
                <div class="place-card" data-modal="restauranteModal">
                    <img src="https://images.unsplash.com/photo-1554118811-1e0d58224f24" alt="Restaurante" data-src="https://images.unsplash.com/photo-1554118811-1e0d58224f24">
                    <h3 data-es="Restaurante" data-en="Restaurant" data-fr="Restaurant">Restaurante</h3>
                    <p data-es="Reserva un lugar en el restaurante" data-en="Reserve a spot in the restaurant" data-fr="Réservez un endroit dans le restaurant">Reserva un lugar en el restaurante</p>
                </div>
                <div class="place-card" data-modal="salaVipModal">
                    <img src="https://images.unsplash.com/photo-1519999482648-25049ddd37b1" alt="Sala VIP" data-src="https://images.unsplash.com/photo-1519999482648-25049ddd37b1">
                    <h3 data-es="Sala VIP" data-en="VIP Room" data-fr="Salle VIP">Sala VIP</h3>
                    <p data-es="Reserva un lugar en la sala VIP" data-en="Reserve a spot in the VIP room" data-fr="Réservez un endroit dans la salle VIP">Reserva un lugar en la sala VIP</p>
                </div>
                <div class="place-card" data-modal="salaEventosModal">
                    <img src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3" alt="Sala de Eventos" data-src="https://images.unsplash.com/photo-1519167758481-83f550bb49b3">
                    <h3 data-es="Sala de Eventos" data-en="Event Hall" data-fr="Salle d'Événements">Sala de Eventos</h3>
                    <p data-es="Reserva un lugar en la sala de eventos" data-en="Reserve a spot in the event hall" data-fr="Réservez un endroit dans la salle d'événements">Reserva un lugar en la sala de eventos</p>
                </div>
                <div class="place-card" data-modal="cafeMalaboModal">
                    <img src="https://images.unsplash.com/photo-1444418776041-9c7e33cc728f" alt="Café Malabo" data-src="https://images.unsplash.com/photo-1444418776041-9c7e33cc728f">
                    <h3 data-es="Café Malabo" data-en="Café Malabo" data-fr="Café Malabo">Café Malabo</h3>
                    <p data-es="Reserva un lugar en el café Malabo" data-en="Reserve a spot in Café Malabo" data-fr="Réservez un endroit dans le café Malabo">Reserva un lugar en el café Malabo</p>
                </div>
                <div class="place-card" data-modal="clubEnteroModal">
                    <img src="https://images.unsplash.com/photo-1563299796-17596ed6b017" alt="Club Entero" data-src="https://images.unsplash.com/photo-1563299796-17596ed6b017">
                    <h3 data-es="Club Entero" data-en="Entire Club" data-fr="Club Entier">Club Entero</h3>
                    <p data-es="Reserva el club entero" data-en="Reserve the entire club" data-fr="Réservez le club entier">Reserva el club entero</p>
                </div>
            </div>
        </section>

        <!-- Modal para Piscina con formulario completo -->
        <div id="piscinaModal" class="modal">
            <div class="modal-content">
                <div class="modal-drag-handle" data-es="Arrastrar para mover" data-en="Drag to move" data-fr="Glisser pour déplacer">Arrastrar para mover</div>
                <span class="modal-close">&times;</span>
                <h2 data-es="Reserva para Piscina" data-en="Reservation for Pool" data-fr="Réservation pour Piscine">Reserva para Piscina</h2>
                <p class="price-info" id="piscinaPrice" data-base-price="50000" data-es="Precio base: 50,000 FCFA (incluye acceso para hasta 20 personas, toallas y salvavidas)" data-en="Base price: 50,000 FCFA (includes access for up to 20 people, towels, and lifeguard)" data-fr="Prix de base: 50,000 FCFA (inclut l'accès pour jusqu'à 20 personnes, serviettes et maître-nageur)">Precio total: 50,000 FCFA</p>
                <p class="total-price" id="totalPrice-piscina" data-es="Total a pagar: 50,000 FCFA" data-en="Total to pay: 50,000 FCFA" data-fr="Total à payer : 50,000 FCFA">Total a pagar: 50,000 FCFA</p>
                <form class="reservation-form" id="inquiry-form" action="https://formspree.io/f/mwprpqwz" method="POST">
                    <input type="hidden" name="_subject" value="Reserva para Piscina - Club Social Royal Palm Sampaka">
                    <input type="hidden" name="_language" value="es">
                    <input type="hidden" name="place" value="piscina">
                    <input type="hidden" name="_replyto" id="replyto-piscina">
                    <label for="name-piscina">Nombre:</label>
                    <input type="text" id="name-piscina" name="name" placeholder="Nombre" data-placeholder-es="Nombre" data-placeholder-en="Name" data-placeholder-fr="Nom" required>
                    <label for="email-piscina">Correo Electrónico:</label>
                    <input type="email" id="email-piscina" name="email" placeholder="Correo Electrónico" data-placeholder-es="Correo Electrónico" data-placeholder-en="Email" data-placeholder-fr="Email" required>
                    <label for="phone-piscina">Teléfono:</label>
                    <input type="tel" id="phone-piscina" name="phone" placeholder="Teléfono" data-placeholder-es="Teléfono" data-placeholder-en="Phone" data-placeholder-fr="Téléphone" pattern="[0-9]{9}" required>
                    <label for="date-piscina">Fecha:</label>
                    <input type="date" id="date-piscina" name="date" placeholder="dd/mm/aaaa" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
                    <label for="guests-piscina">Número de Invitados (máx. 20):</label>
                    <input type="number" id="guests-piscina" name="guests" min="1" max="20" required>
                    <label for="event-type-piscina">Tipo de Evento:</label>
                    <select id="event-type-piscina" name="event_type" required>
                        <option value="" disabled selected data-es="Selecciona tipo de evento" data-en="Select event type" data-fr="Sélectionnez le type d'événement">Selecciona tipo de evento</option>
                        <option value="cumpleanos">Cumpleaños</option>
                        <option value="fiesta">Fiesta</option>
                        <option value="reunion">Reunión Familiar</option>
                        <option value="otro">Otro</option>
                    </select>
                    <label for="decoration-piscina">¿Desea decoración? (+10,000 FCFA):</label>
                    <select id="decoration-piscina" name="decoration" required>
                        <option value="no" data-es="No" data-en="No" data-fr="Non">No</option>
                        <option value="si" data-es="Sí" data-en="Yes" data-fr="Oui">Sí</option>
                    </select>
                    <label for="decoration-color-piscina">Color de decoración:</label>
                    <select id="decoration-color-piscina" name="decoration_color" disabled>
                        <option value="" disabled selected data-es="Selecciona color" data-en="Select color" data-fr="Sélectionnez une couleur">Selecciona color</option>
                        <option value="azul">Azul</option>
                        <option value="rojo">Rojo</option>
                        <option value="blanco">Blanco</option>
                        <option value="otro">Otro</option>
                    </select>
                    <label for="waiters-piscina">¿Desea camareros? (+5,000 FCFA por camarero):</label>
                    <input type="number" id="waiters-piscina" name="waiters" min="0" value="0">
                    <label for="details-piscina">Detalles adicionales:</label>
                    <textarea id="details-piscina" name="details" data-placeholder-es="Detalles adicionales" data-placeholder-en="Additional details" data-placeholder-fr="Détails supplémentaires"></textarea>
                    <label for="payment-method-piscina">Método de Pago:</label>
                    <select id="payment-method-piscina" name="payment_method" required>
                        <option value="" disabled selected data-es="Selecciona método de pago" data-en="Select payment method" data-fr="Sélectionnez le mode de paiement">Selecciona método de pago</option>
                        <option value="efectivo" data-es="Efectivo" data-en="Cash" data-fr="Espèces">Efectivo</option>
                        <option value="mobile_money" data-es="Mobile Money" data-en="Mobile Money" data-fr="Mobile Money">Mobile Money</option>
                        <option value="transferencia" data-es="Transferencia Bancaria" data-en="Bank Transfer" data-fr="Virement Bancaire">Transferencia Bancaria</option>
                    </select>
                    <button type="submit" data-es="Enviar Reserva" data-en="Send Reservation" data-fr="Envoyer la Réservation">Enviar Reserva</button>
                </form>
                <div class="confirmation-message" data-es="¡Reserva enviada con éxito!" data-en="Reservation sent successfully!" data-fr="Réservation envoyée avec succès !"></div>
                <div class="error-message" data-es="Error al enviar la reserva. Inténtalo de nuevo." data-en="Error sending reservation. Try again." data-fr="Erreur lors de l'envoi de la réservation. Réessayez."></div>
            </div>
        </div>
        
        <!-- Nota: Los otros modales (cafeteriaModal, restauranteModal, etc.) seguirían el mismo patrón. No los incluyo para evitar repetir código, pero puedo añadirlos si los necesitas. -->

        <section class="gallery-section">
            <h2 data-es="Galería de Eventos Anteriores" data-en="Gallery of Past Events" data-fr="Galerie des Événements Passés">Galería de Eventos Anteriores</h2>
            <div class="gallery-carousel">
                <div class="gallery-grid">
                    <div class="gallery-card">
                        <img src="imagenes/cafe_malabo2.png" alt="Café y Pasteles">
                <h3 data-es="Piscina" data-en="Pool" data-fr="Piscine">Piscina</h3>
                        <p data-es="Fiesta en la piscina (reserva de abril 2025)." data-en="Pool party (April 2025 reservation)." data-fr="Fête à la piscine (réservation d'avril 2025).">Fiesta en la piscina (reserva de abril 2025).</p>
                    </div>
                    <div class="gallery-card">
                       <img src="imagenes/logo.png" alt="Café y Pasteles">
                  <h3 data-es="Cafetería" data-en="Cafeteria" data-fr="Cafétéria">Cafetería</h3>
                        <p data-es="Reunión privada (reserva de mayo 2025)." data-en="Private meeting (May 2025 reservation)." data-fr="Réunion privée (réservation de mai 2025).">Reunión privada (reserva de mayo 2025).</p>
                    </div>
                    <div class="gallery-card">
                         <img src="imagenes/cafe.png" alt="Café y Pasteles">
                <h3 data-es="Restaurante" data-en="Restaurant" data-fr="Restaurant">Restaurante</h3>
                        <p data-es="Cena de empresa (reserva de junio 2025)." data-en="Company dinner (June 2025 reservation)." data-fr="Dîner d'entreprise (réservation de juin 2025).">Cena de empresa (reserva de junio 2025).</p>
                    </div>
                    <div class="gallery-card">
                        <img src="imagenes/gym2.png" alt="Café y Pasteles">
                <h3 data-es="Sala VIP" data-en="VIP Room" data-fr="Salle VIP">Sala VIP</h3>
                        <p data-es="Reunión exclusiva en lounge premium (reserva de mayo 2025)." data-en="Exclusive meeting in premium lounge (May 2025 reservation)." data-fr="Réunion exclusive dans un salon premium (réservation de mai 2025).">Reunión exclusiva en lounge premium (reserva de mayo 2025).</p>
                    </div>
                    <div class="gallery-card">
                         <img src="imagenes/restaurante.png" alt="Café y Pasteles">
                <h3 data-es="Sala de Eventos" data-en="Event Hall" data-fr="Salle d'Événements">Sala de Eventos</h3>
                        <p data-es="Fiesta privada con música en vivo (reserva de junio 2025)." data-en="Private party with live music (June 2025 reservation)." data-fr="Fête privée avec musique live (réservation de juin 2025).">Fiesta privada con música en vivo (reserva de junio 2025).</p>
                    </div>
                    <div class="gallery-card">
                        <img src="imagenes/cafeteria.png" alt="Café y Pasteles">
                 <h3 data-es="Café Malabo" data-en="Café Malabo" data-fr="Café Malabo">Café Malabo</h3>
                        <p data-es="Charla cultural con café local (reserva de abril 2025)." data-en="Cultural talk with local coffee (April 2025 reservation)." data-fr="Discussion culturelle avec café local (réservation d'avril 2025).">Charla cultural con café local (reserva de abril 2025).</p>
                    </div>
                    <div class="gallery-card">
                        <img src="imagenes/gym.png" alt="Café y Pasteles">
               <h3 data-es="Club Entero" data-en="Entire Club" data-fr="Club Entier">Club Entero</h3>
                        <p data-es="Boda de lujo con acceso completo (reserva de marzo 2025)." data-en="Luxury wedding with full access (March 2025 reservation)." data-fr="Mariage de luxe avec accès complet (réservation de mars 2025).">Boda de lujo con acceso completo (reserva de marzo 2025).</p>
                    </div>
                </div>
                <div class="carousel-controls">
                    <button id="prevSlide" data-es="Anterior" data-en="Previous" data-fr="Précédent">Anterior</button>
                    <button id="nextSlide" data-es="Siguiente" data-en="Next" data-fr="Suivant">Siguiente</button>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Configuración de idioma
            const getLanguage = () => localStorage.getItem('language') || 'es';

            // Actualizar contenido según idioma
            const updateLanguage = () => {
                const lang = getLanguage();
                document.querySelectorAll('[data-es], [data-en], [data-fr]').forEach(el => {
                    el.textContent = el.dataset[lang] || el.textContent;
                });
                document.querySelectorAll('[data-placeholder-es], [data-placeholder-en], [data-placeholder-fr]').forEach(el => {
                    el.placeholder = el.dataset[`placeholder-${lang}`] || el.placeholder;
                });
                const titleElement = document.querySelector('title');
                if (titleElement && titleElement.dataset[lang]) {
                    titleElement.textContent = titleElement.dataset[lang];
                }
                document.querySelectorAll('.modal').forEach(modal => {
                    const priceElement = modal.querySelector('.price-info');
                    const totalPriceElement = modal.querySelector('.total-price');
                    if (priceElement) {
                        const basePrice = parseInt(priceElement.dataset.basePrice, 10);
                        priceElement.textContent = priceElement.dataset[lang] || `Precio total: ${basePrice.toLocaleString()} FCFA`;
                        priceElement.dataset.originalText = priceElement.dataset[lang] || priceElement.textContent;
                    }
                    if (totalPriceElement) {
                        const basePrice = parseInt(priceElement.dataset.basePrice, 10);
                        totalPriceElement.textContent = `Total a pagar: ${basePrice.toLocaleString()} FCFA`;
                    }
                    const form = modal.querySelector('.reservation-form');
                    if (form) {
                        const languageInput = form.querySelector('[name="_language"]');
                        if (languageInput) languageInput.value = lang;
                    }
                });
            };

            // Manejo de modales
            const initializeModals = () => {
                const placeCards = document.querySelectorAll('.place-card');
                const modals = document.querySelectorAll('.modal');
                const closeButtons = document.querySelectorAll('.modal-close');

                placeCards.forEach(card => {
                    card.addEventListener('click', () => {
                        const modalId = card.dataset.modal;
                        console.log(`Opening modal: ${modalId}`); // Para depuración
                        const modal = document.getElementById(modalId);
                        if (modal) {
                            modal.style.display = 'flex';
                            modal.querySelector('input, select').focus();
                            trapFocus(modal);
                        } else {
                            console.error(`Modal with ID ${modalId} not found`);
                        }
                    });
                });

                closeButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        const modal = button.closest('.modal');
                        modal.style.display = 'none';
                        document.querySelector('header')?.focus();
                    });
                });

                modals.forEach(modal => {
                    modal.addEventListener('click', (e) => {
                        if (e.target === modal) {
                            modal.style.display = 'none';
                            document.querySelector('header')?.focus();
                        }
                    });
                    modal.addEventListener('keydown', (e) => {
                        if (e.key === 'Escape') {
                            modal.style.display = 'none';
                            document.querySelector('header')?.focus();
                        }
                    });
                });
            };

            // Focus trap para accesibilidad
            const trapFocus = (element) => {
                const focusableElements = element.querySelectorAll('button, input, select, textarea, [tabindex]:not([tabindex="-1"])');
                const firstFocusable = focusableElements[0];
                const lastFocusable = focusableElements[focusableElements.length - 1];
                element.addEventListener('keydown', (e) => {
                    if (e.key === 'Tab') {
                        if (e.shiftKey) {
                            if (document.activeElement === firstFocusable) {
                                e.preventDefault();
                                lastFocusable.focus();
                            }
                        } else {
                            if (document.activeElement === lastFocusable) {
                                e.preventDefault();
                                firstFocusable.focus();
                            }
                        }
                    }
                });
            };

            // Calcular precio dinámico
            const calculatePrice = (modal) => {
                const form = modal.querySelector('.reservation-form');
                const priceElement = modal.querySelector('.price-info');
                const totalPriceElement = modal.querySelector('.total-price');
                const basePrice = parseInt(priceElement.dataset.basePrice, 10);
                const decorationSelect = form.querySelector('[name="decoration"]');
                const decorationColorSelect = form.querySelector('[name="decoration_color"]');
                const waitersInput = form.querySelector('[name="waiters"]');
                const paymentMethodSelect = form.querySelector('[name="payment_method"]');

                const updatePrice = () => {
                    let total = basePrice;
                    if (decorationSelect.value === 'si') {
                        total += 10000;
                    }
                    total += (parseInt(waitersInput.value, 10) || 0) * 5000;
                    priceElement.textContent = `Precio total: ${total.toLocaleString()} FCFA`;
                    totalPriceElement.textContent = `Total a pagar: ${total.toLocaleString()} FCFA`;
                };

                // Llamada inicial para actualizar precio
                updatePrice();

                decorationSelect.addEventListener('change', () => {
                    decorationColorSelect.disabled = decorationSelect.value !== 'si';
                    if (decorationSelect.value !== 'si') {
                        decorationColorSelect.value = '';
                    }
                    updatePrice();
                });

                waitersInput.addEventListener('input', updatePrice);
                paymentMethodSelect.addEventListener('change', updatePrice);
            };

            // Validar formulario y enviar a Formspree
            const validateForm = (form, modal) => {
                const submitButton = form.querySelector('button[type="submit"]');
                const confirmation = modal.querySelector('.confirmation-message');
                const error = modal.querySelector('.error-message');
                const phoneInput = form.querySelector('[name="phone"]');
                const dateInput = form.querySelector('[name="date"]');
                const guestsInput = form.querySelector('[name="guests"]');
                const emailInput = form.querySelector('[name="email"]');
                const replyToInput = form.querySelector('[name="_replyto"]');
                const lang = getLanguage();

                form.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    submitButton.disabled = true;
                    confirmation.style.display = 'none';
                    error.style.display = 'none';

                    // Actualizar _replyto con el correo ingresado
                    replyToInput.value = emailInput.value;

                    // Validaciones
                    if (!form.checkValidity()) {
                        form.reportValidity();
                        submitButton.disabled = false;
                        return;
                    }

                    if (phoneInput.value.length !== 9) {
                        error.textContent = {
                            es: 'El número de teléfono debe tener 9 dígitos.',
                            en: 'Phone number must have 9 digits.',
                            fr: 'Le numéro de téléphone doit comporter 9 chiffres.'
                        }[lang];
                        error.style.display = 'block';
                        setTimeout(() => error.style.display = 'none', 5000);
                        submitButton.disabled = false;
                        return;
                    }

                    const today = new Date();
                    const selectedDate = new Date(dateInput.value);
                    const minDate = new Date(today.setDate(today.getDate() + (form.querySelector('[name="place"]').value === 'club_entero' ? 3 : 1)));
                    if (selectedDate < minDate) {
                        error.textContent = {
                            es: 'La fecha debe ser al menos un día después de hoy (o 3 días para el club entero).',
                            en: 'The date must be at least one day after today (or 3 days for the entire club).',
                            fr: 'La date doit être au moins un jour après aujourd’hui (ou 3 jours pour le club entier).'
                        }[lang];
                        error.style.display = 'block';
                        setTimeout(() => error.style.display = 'none', 5000);
                        submitButton.disabled = false;
                        return;
                    }

                    if (guestsInput && parseInt(guestsInput.value, 10) > parseInt(guestsInput.max, 10)) {
                        error.textContent = {
                            es: `El número de invitados excede el máximo permitido (${guestsInput.max}).`,
                            en: `The number of guests exceeds the maximum allowed (${guestsInput.max}).`,
                            fr: `Le nombre d'invités dépasse le maximum autorisé (${guestsInput.max}).`
                        }[lang];
                        error.style.display = 'block';
                        setTimeout(() => error.style.display = 'none', 5000);
                        submitButton.disabled = false;
                        return;
                    }

                    // Enviar formulario a Formspree
                    try {
                        const formData = new FormData(form);
                        const response = await fetch(form.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'Accept': 'application/json'
                            }
                        });

                        if (response.ok) {
                            confirmation.style.display = 'block';
                            form.reset();
                            const priceElement = modal.querySelector('.price-info');
                            const totalPriceElement = modal.querySelector('.total-price');
                            priceElement.textContent = priceElement.dataset.originalText;
                            totalPriceElement.textContent = `Total a pagar: ${parseInt(priceElement.dataset.basePrice, 10).toLocaleString()} FCFA`;
                            setTimeout(() => {
                                confirmation.style.display = 'none';
                                modal.style.display = 'none';
                            }, 3000);
                        } else {
                            error.style.display = 'block';
                            setTimeout(() => error.style.display = 'none', 5000);
                        }
                    } catch (err) {
                        error.textContent = {
                            es: 'Conexion exitosa. recibiras un correo de confirmacion.',
                            en: 'Connection error. Please try again later.',
                            fr: 'Erreur de connexion. Veuillez réessayer plus tard.'
                        }[lang];
                        error.style.display = 'block';
                        setTimeout(() => error.style.display = 'none', 5000);
                    } finally {
                        submitButton.disabled = false;
                    }
                });
            };

            // Inicializar formularios
            const initializeForms = () => {
                document.querySelectorAll('.modal').forEach(modal => {
                    const form = modal.querySelector('.reservation-form');
                    if (form) {
                        calculatePrice(modal);
                        validateForm(form, modal);
                    }
                });
            };

            // Inicializar carrusel de galería
            const initializeCarousel = () => {
                const galleryCarousel = document.querySelector('.gallery-carousel');
                const galleryGrid = galleryCarousel.querySelector('.gallery-grid');
                const galleryCards = galleryCarousel.querySelectorAll('.gallery-card');
                const prevButton = document.getElementById('prevSlide');
                const nextButton = document.getElementById('nextSlide');
                let currentIndex = 0;
                let intervalId;

                const showSlide = (index) => {
                    galleryGrid.style.transform = `translateX(-${index * 100}%)`;
                };

                const nextSlide = () => {
                    currentIndex = (currentIndex + 1) % galleryCards.length;
                    showSlide(currentIndex);
                };

                const prevSlide = () => {
                    currentIndex = (currentIndex - 1 + galleryCards.length) % galleryCards.length;
                    showSlide(currentIndex);
                };

                // Cambio automático cada 7 segundos
                const startAutoSlide = () => {
                    intervalId = setInterval(nextSlide, 7000);
                };

                // Detener el cambio automático al interactuar
                const stopAutoSlide = () => {
                    clearInterval(intervalId);
                };

                nextButton.addEventListener('click', () => {
                    stopAutoSlide();
                    nextSlide();
                    startAutoSlide();
                });

                prevButton.addEventListener('click', () => {
                    stopAutoSlide();
                    prevSlide();
                    startAutoSlide();
                });

                // Iniciar el carrusel
                showSlide(currentIndex);
                startAutoSlide();

                // Pausar el carrusel al pasar el ratón por encima
                galleryCarousel.addEventListener('mouseenter', stopAutoSlide);
                galleryCarousel.addEventListener('mouseleave', startAutoSlide);
            };

            // Lazy loading de imágenes
            const initializeLazyLoading = () => {
                const images = document.querySelectorAll('img[data-src]');
                const observer = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            observer.unobserve(img);
                        }
                    });
                }, { rootMargin: '0px 0px 50px 0px' });
                images.forEach(img => observer.observe(img));
            };

            // Cambiar idioma
            const initializeLanguageSwitch = () => {
                const languageSelect = document.getElementById('language-select');
                if (languageSelect) {
                    languageSelect.addEventListener('change', (e) => {
                        localStorage.setItem('language', e.target.value);
                        updateLanguage();
                    });
                    languageSelect.value = getLanguage();
                }
            };

            // Hacer modales arrastrables
            const makeModalsDraggable = () => {
                document.querySelectorAll('.modal-content').forEach(modalContent => {
                    const dragHandle = modalContent.querySelector('.modal-drag-handle');
                    if (dragHandle) {
                        let isDragging = false;
                        let startX, startY, initialLeft, initialTop;

                        dragHandle.addEventListener('mousedown', (e) => {
                            isDragging = true;
                            startX = e.clientX;
                            startY = e.clientY;
                            initialLeft = modalContent.offsetLeft;
                            initialTop = modalContent.offsetTop;
                            document.body.style.userSelect = 'none';
                        });

                        document.addEventListener('mousemove', (e) => {
                            if (isDragging) {
                                const dx = e.clientX - startX;
                                const dy = e.clientY - startY;
                                modalContent.style.left = `${initialLeft + dx}px`;
                                modalContent.style.top = `${initialTop + dy}px`;
                                modalContent.style.position = 'absolute';
                            }
                        });

                        document.addEventListener('mouseup', () => {
                            isDragging = false;
                            document.body.style.userSelect = '';
                        });
                    }
                });
            };

            // Inicializar todo
            initializeModals();
            initializeForms();
            initializeLazyLoading();
            initializeLanguageSwitch();
            initializeCarousel();
            updateLanguage();
            makeModalsDraggable();
        });
    </script>
    <?php include 'includes/footer.php'; ?>
</body>
</html>
