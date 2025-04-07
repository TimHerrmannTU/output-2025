<div class="light-bg">
    <div class="wrapper col gap-3">
        <h3 class="pt-3 pb-1">Cäsar Chiffre</h3>
        <div class="col gap-1">
            <h4>Was ist ein Cäsar Chiffre?</h4>
            <p>
                Der Caesar-Chiffre ist eine der ältesten bekannten Verschlüsselungsmethoden und 
                wurde angeblich von Julius Caesar selbst verwendet. Normalerweise verschiebt man 
                dabei Buchstaben im Alphabet um eine feste Anzahl (der schüssel).
            </p>
        </div>
        <div class="col gap-1">
            <p>
                Hier wenden wir das Prinzip jedoch nur auf Zahlen an. Jede Ziffer d wurde durch n = (d + 4) mod 10 ersetzt, also zum Beispiel:
            </p>
            <table class="center">
                <tr>
                    <td><b>d</b></td>
                    <td>0</td>
                    <td>1</td>
                    <td>2</td>
                    <td>3</td>
                    <td>9</td>
                </tr>
                <tr>
                    <td>↓</td>
                    <td>↓</td>
                    <td>↓</td>
                    <td>↓</td>
                    <td>↓</td>
                    <td>↓</td>
                </tr>
                <tr>
                    <td><b>n</b></td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>3</td>
                </tr>
            </table>
        </div>
        <div class="col gap-1">
            <h4>Anleitung zum Entschlüsseln:</h4>
            <ol type="1">
                <li><b>Betrachte jede Ziffer</b> im verschlüsselten String:<br><b>N 95° 45.146' E 457° 88.505</b></li>
                <li><b>Verschiebe sie „rückwärts“</b> um 4 (modulo 10).<br>Anders gesagt: (d - 4) mod 10 (Oder, wem das lieber ist, (d+6) mod 10 (d + 6) mod 10.)</li>
                <li><b>Ersetze jede verschlüsselte Ziffer</b> durch das Ergebnis dieser Rückverschiebung.</li>
                <li><b>Alle anderen Zeichen</b> (Buchstaben, Gradzeichen, Apostroph, Punkt, Leerzeichen) bleiben so, wie sie sind.</li>
            </ol>
            <p>Am Ende erhältst du die echten Koordinaten!</p>
        </div>
        <div class="col gap-1">
            <h4>Hinweis</h4>
            <ul>
                <li><b>N</b> und <b>E</b> bleiben unverändert.</li>
                <li><b>Nicht</b> an den Zeichen °, ' und . herumfummeln.</li>
                <li><b>Nur die Ziffern</b> werden zurückverschoben.</li>
            </ul>
        </div>
        <div class="col gap-1">
            <h4>Fun Fact:</h4>
            <p>
                Der <b>Caeser-Chiffre</b> trägt seinen Namen zu Ehren von <b>Gaius Iulius Caesar</b>, der eine ähnliche Methode (mit einer Verschiebung um 3 oder mehr) nutzte, 
                um seine persönlichen Briefe abzusichern.
            </p>
            <p>
                Die Caesar-Verschlüsselung ist heutzutage so leicht zu knacken, dass sie in der Praxis keinen echten Schutz mehr bietet. 
                Da es nur eine sehr begrenzte Anzahl möglicher Verschiebungen gibt (beispielsweise 26 bei einem klassischen Alphabet), kann man sie praktisch in 
                Sekundenbruchteilen durch Ausprobieren aller Verschiebungen (Brute-Force) knacken. Mit heutigen Computern dauert das also kaum länger als ein Wimpernschlag!
            </p>
            <p>Viel Erfolg beim Rätseln und frohes Cachen!</p>
        </div>
    </div>
</div>