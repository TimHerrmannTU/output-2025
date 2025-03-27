<div class="light-bg">
    <div class="wrapper col gap-3">
        <h3 class="pt-3 pb-1">REGEX</h3>
        <div class="col gap-1">
            <h4>Was ist Regex?</h4>
            <p>
                Regex aka "regular expression" sind Muster, mit denen du Texte durchsuchen und verarbeiten kannst. Sie
                helfen, bestimmte Zeichenfolgen in einem Text zu finden.
            </p>
        </div>
        <table>
            <tr>
                <th>Beispielmuster</th>
                <th>Übereinstimmungen</th>
            </tr>
            <tr>
                <td>A[a-z]*</td>
                <td>Alle Wörter in einem Text finden welche mit "A" beginnen! [a-z]* bedeutet beliebig viele
                    Kleinbuchstaben.</td>
            </tr>
            <tr>
                <td>[0-9]{3}</td>
                <td>3 Ziffern zwischen 0 bis 9 hintereinander.</td>
            </tr>
            <tr>
                <td>[0-9]{3,4}</td>
                <td>3 oder 4 Ziffern zwischen 0 bis 9 hintereinander.</td>
            </tr>
            <tr>
                <td>[AB]C</td>
                <td>A oder B gefolgt von einem C.</td>
            </tr>
        </table>
        <div class="row gap-3">
            <div class="col gap-1">
                <h4>Aufbau von Koordinaten:</h4>
                <ol>
                    <li>"N" oder "E" gefolgt von 2 oder 3 Ziffern gefolgt von einem "°"</li>
                    <li>Genau 2 Ziffern gefolgt von einem "."</li>
                    <li>Genau 3 Ziffern</li>
                </ol>
            </div>
            <div class="col gap-1">
                <h4>Beispiel</h4>
                <p>N50°69.420<br>E187°00.161</p>
            </div>
        </div>
        <div class="col gap-2">
            <div class="row gap-1"><p class="fat">Verfolständige diesen Regex:</p><code>[NE][0-9]{ , }°[ - ]{2}.</code></div>
            <p>
                Wenn du den Regex korrekt vervollständigt hast, kannst du damit die Koordinanten in diesem Text finden:
            </p>
            <code class="mt-1">
                N5°1.0X1E013°4.40A0N510°1.50B1E13°43.4C00N5°01.501E01°343.400N51°1.50D1E013°3.400
                <br>
                N51°01.712E013°43.434N5101°.501E0134°3.400N51°0101.501E013°043.400N51°013.501
                <br>
                E3°43.400N5°1.01.501E013°4.3.400N51°121.501EB013°43.400M51°01.501E013.43.400
                <br>
                E3°43.400N5°1.01.501
            </code>
            <a href="https://regexr.com/">
                Hier kannst du dein Regex ausprobieren!
            </a>
        </div>
    </div>
</div>