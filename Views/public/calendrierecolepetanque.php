<?php require_once "Views/public/menu.php"?>
<head>
    <title>Calendrier</title>
    <style>
        .calendar {
            font-family: Arial, sans-serif;
            width: 800px;
            margin: 0 auto;
            background-color: #eae9b9;
            border: 1px solid #f1e50e;
            padding: 20px;
            box-shadow: 0 0 5px rgb(64, 211, 211);
        }

        .month {
            background-color: #19c5e3;
            color: #fff;
            text-align: center;
            padding: 15px;
            margin-bottom: 20px;
            position: relative;
        }

        #prevMonth,
        #nextMonth {
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            padding: 10px;
            font-size: 18px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }

        #prevMonth {
            left: 10px;
        }

        #nextMonth {
            right: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            font-size: 24px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        td {
            height: 120px;
            font-size: 20px;
        }

        td:hover {
            background-color: #f2f2f2;
        }

        td.with-button {
            position: relative;
        }

        td.with-button span {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        h1 {
            margin: 0;
            font-size: 36px;
        }
    </style>
</head>
<body>
<br><br><br><br>
<div class="calendar">
    <div class="month">
        <button id="prevMonth">&#8249;</button>
        <h1 id="currentMonth"></h1>
        <button id="nextMonth">&#8250;</button>
    </div>
    <table id="calendarTable" class="table">
        <thead>
        <tr>
            <th>Dim</th>
            <th>Lun</th>
            <th>Mar</th>
            <th>Mer</th>
            <th>Jeu</th>
            <th>Ven</th>
            <th>Sam</th>
        </tr>
        </thead>
        <tbody id="calendarBody">
        <!-- Les jours du mois seront ajoutés ici dynamiquement -->
        </tbody>
    </table>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var currentMonth = new Date().getMonth();
        var currentYear = new Date().getFullYear();
        var months = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

        function generateCalendar(month, year) {
            var firstDay = new Date(year, month, 1);
            var daysInMonth = new Date(year, month + 1, 0).getDate();
            var startingDay = firstDay.getDay();
            var calendarBody = document.getElementById("calendarBody");
            calendarBody.innerHTML = '';

            document.getElementById("currentMonth").textContent = months[month] + ' ' + year;

            var date = 1;
            for (var i = 0; i < 6; i++) {
                var row = document.createElement("tr");
                for (var j = 0; j < 7; j++) {
                    if (i === 0 && j < startingDay) {
                        var cell = document.createElement("td");
                        row.appendChild(cell);
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        var cell = document.createElement("td");
                        cell.textContent = date;

                        // Parcourir la liste des écoles pour afficher les écoles à leur date correspondante
                        <?php foreach ($this->data['lesEcoles'] as $ecole): ?>
                        var ecoleDate = new Date("<?php echo $ecole->getEcoleDate(); ?>");
                        if (ecoleDate.getFullYear() === year && ecoleDate.getMonth() === month && ecoleDate.getDate() === date) {
                            var link = document.createElement("a");
                            var br = document.createElement("br");
                            link.textContent = "<?php echo $ecole->getEcoleTitre(); ?>";
                            link.href = "indexpublic.php?page=eco_ecoledetail&id=<?= $ecole->getEcoleId() ?>";  // Ajoutez ici le lien approprié
                            cell.appendChild(br);
                            cell.appendChild(link);
                            cell.classList.add("with-button"); // Ajoute la classe CSS pour ajuster le positionnement du contenu texte
                        }
                        <?php endforeach; ?>

                        row.appendChild(cell);
                        date++;
                    }
                }
                calendarBody.appendChild(row);
            }
        }

        generateCalendar(currentMonth, currentYear);

        document.getElementById("prevMonth").addEventListener("click", function() {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            generateCalendar(currentMonth, currentYear);
        });

        document.getElementById("nextMonth").addEventListener("click", function() {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            generateCalendar(currentMonth, currentYear);
        });
    });

</script>
</body>
</html>
<?php require_once "Views/public/footer.php" ?>