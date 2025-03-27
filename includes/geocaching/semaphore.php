
<div class="light-bg">
    <div class="wrapper col gap-3">
        <h3 class="pt-3 pb-1">SEMAPHORE</h3>
        <p class="pb-2">
            Ein Semaphore ist eine Synchronisationsmethode, die in Betriebssystemen verwendet wird, um den
            Zugriff mehrerer Prozesse oder Threads auf gemeinsame Ressourcen zu steuern.
        </p>

        <div class="row gap-3">
            <div class="col w-50 gap-2">
                <p>
                    Hier ein anschauliches Beispiel:
                    Stell dir vor, du und 2 Freunde wollen eine Pizza backen. Bestimmte Schritte müssen in der
                    richtigen Reihenfolge ablaufen, und einige Aufgaben können parallel erledigt werden. Damit die
                    Reihenfolge korrekt eingehalten wird, kann man Semaphoren verwenden. Personen sind quasi die
                    Programme.
                </p>
                <ol>
                    <li><b>Teig vorbereiten</b> (muss vor dem Belegen passieren!)</li>
                    <li><b>Belag schneiden</b> (kann parallel passieren!)</li>
                    <li><b>Ofen vorheizen</b> (muss vor dem Backen abgeschlossen sein!)</li>
                    <li><b>Pizza belegen</b> (geht erst, wenn Teig fertig ist!)</li>
                    <li><b>Pizza backen</b> (geht erst, wenn Ofen heiß und Pizza belegt ist!)</li>
                    <li><b>Pizza servieren</b> (erst nach dem Backen! 🍕)</li>
                </ol>
            </div>
            <div class="col w-50 gap-2">
                <h4>Technische Funktionsweise</h4>
                <table>
                    <tr>
                        <td class="fat">semaphore(0)</td>
                        <td>
                            Initialisierung der Semaphore mit dem Wert 0 (oder mit einer anderen natürlichen Zahl).
                        </td>
                    </tr>
                    <tr>
                        <td class="fat">semaphore.down()</td>
                        <td>
                            Der Wert der Semaphore wird dekrementieren (-1) sobald er größer 0 ist. Bis
                            das der Fall ist wartet das Programm.
                        </td>
                    </tr>
                    <tr>
                        <td class="fat">semaphore.up()</td>
                        <td>Der Wert der Semaphore inkrementieren (+1).</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="col">
            <h4 class="mb-1">Semaphoren</h4>
            <div class="row gap-3">
                <p>teig_semaphore(0)</p>
                <p>belegt_semaphore(0)</p>
                <p>ofen_semaphore(0)</p>
                <p>gebacken_semaphore(0)</p>
            </div>
        </div>
        <table class="center">
            <tr>
                <th>Person 1</th>
                <th>Person 2</th>
                <th>Person 3</th>
            </tr>
            <tr>
                <td>Teig vorbereiten</td>
                <td>Belag schneiden</td>
                <td>Ofen vorheizen</td>
            </tr>
            <tr>
                <td><b>teig_semaphore.up()</b></td>
                <td></td>
                <td><b>ofen_semaphore.up()</b></td>
            </tr>
            <tr>
                <td><b>ofen_semaphore.down()</b></td>
                <td><b>teig_semaphore.down()</b></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Pizza belegen</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><b>belegt_semaphore.up()</b></td>
                <td></td>
            </tr>
            <tr>
                <td><b>belegt_semaphore.down()</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>Pizza backen</td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td><b>gebacken_semaphore.up()</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><b>gebacken_semaphore.down()</b></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>Pizza servieren</td>
            </tr>
        </table>

        <p>
            Jetzt bist du dran! Diese 3 Programme werden mit Semaphoren synchronisiert & spucken dir die
            Koordinaten für den nächsten Cache aus. Viel Glück!
        </p>

        <div>
            <h4 class="mb-1">Semaphoren</h4>
            <div class="row gap-3">
                <p>semaphore_1(0)</p>
                <p>semaphore_2(0)</p>
                <p>semaphore_3(1)</p>
            </div>
        </div>

        <table class="center">
            <tr>
                <th>Programm 1</th>
                <th>Programm 2</th>
                <th>Programm 3</th>
            </tr>
            <tr>
                <td><b>semaphore_1.down()</b></td>
                <td><b>semaphore_2.down()</b></td>
                <td><b>semaphore_3.down()</b></td>
            </tr>
            <tr>
                <td>01.875</td>
                <td>E013°</td>
                <td>N51°</td>
            </tr>
            <tr>
                <td><b>semaphore_2.up()</b></td>
                <td><b>semaphore_3.up()</b></td>
                <td><b>semaphore_1.up()</b></td>
            </tr>
            <tr>
                <td><b>semaphore_3.down()</b></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>43.644</td>
                <td></td>
                <td></td>
            </tr>
        </table>

    </div>
</div>