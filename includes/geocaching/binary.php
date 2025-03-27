<div class="light-bg">
    <div class="wrapper col gap-3">
        <h3 class="pt-3 pb-1">BINÄR KODIERUNG</h3>
        <div class="col gap-1">
            <h4>Was ist binär Kodierung?</h4>
            <p>
                Binäre Kodierung wird in der Informatik verwendet, um Informationen mit nur zwei Zuständen (0 und 1)
                darzustellen. Computer arbeiten mit elektrischen Signalen, die entweder an (1) oder aus (0) sind.
                Diese Zustände bilden die Grundlage für alle Datenverarbeitung.
                Damit können unter anderem dezimal Zahlen gespeichert werden. Unten folgen die Zahlen 0-9 in binär
                Kodierung:
            </p>
        </div>
        <table class="center">
            <tr>
                <th>Binär</th>
                <th>Dezimal</th>
            </tr>
            <tr>
                <td>0000</td>
                <td>0</td>
            </tr>
            <tr>
                <td>0001</td>
                <td>1</td>
            </tr>
            <tr>
                <td>0010</td>
                <td>2</td>
            </tr>
            <tr>
                <td>0011</td>
                <td>3</td>
            </tr>
            <tr>
                <td>0100</td>
                <td>4</td>
            </tr>
            <tr>
                <td>0101</td>
                <td>5</td>
            </tr>
            <tr>
                <td>0110</td>
                <td>6</td>
            </tr>
            <tr>
                <td>0111</td>
                <td>7</td>
            </tr>
            <tr>
                <td>1000</td>
                <td>8</td>
            </tr>
            <tr>
                <td>1001</td>
                <td>9</td>
            </tr>
        </table>
        <div class="col gap-1">
            <h4>Wie funktioniert das ganze?</h4>
            <p>Beispiel: <b>0101 → 5</b></p>
            <table class="center">
                <tr>
                    <td>0</td>
                    <td>1</td>
                    <td>0</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td>↓</td>
                    <td>↓</td>
                    <td>↓</td>
                    <td>↓</td>
                </tr>
                <tr>
                    <td>0x8</td>
                    <td>1x4</td>
                    <td>0x2</td>
                    <td>1x1</td>
                </tr>
            </table>
            <p>0x8 + 1x4 + 0x2 + 1x1 = 4 + 1 = 5</p>
        </div>
        <div class="col gap-1">
            <h4>RÄTSEL</h4>
            <p>So und nun kannst du das ganze anwenden & die Koordinaten unten entschlüsseln:</p>
            <code>
                <b>N</b> 0101 0001 ° 0000 0001 . 0111 1000 0010 '
                <br>
                <b>E</b> 0000 0001 0011 ° 0100 0011 . 0110 0011 0101 '
            </code>
        </div>
    </div>
</div>