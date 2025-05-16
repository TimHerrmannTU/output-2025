<div class="light-bg">
    <div class="wrapper col gap-3">
        <h3 class="pb-1">BASE64</h3>
        <div class="col gap-3">
            <p>
                <b>Base64</b> ist ein <b>Kodierungsverfahren</b>, das <b>Binärdaten in lesbaren Text umwandelt</b>.
                Es wird oft verwendet, um
                Bilder, Dateien oder andere Daten als <b>Text</b> darzustellen, z. B. in E-Mails oder URLs.
            </p>
            <div class="col gap-1">
                <h4>Warum braucht die Informatik das?</h4>
                <p>
                    Zum Beispiel muss auf einer Website dein Name an den Server übergeben werden. Das könnte unter
                    anderem als URL-Parameter passieren:
                </p>
                <p>
                    https://www.geocaching.com/p/?<span class="color-cyan">u=Max</span>
                </p>
                <p>
                    Da die Möglichkeit besteht, dass dein Name Sonderzeichen enthält, welche eine URL
                    "kaputt" machen könnten, wird dieser in BASE64 kodiert vor der Versendung:
                </p>
                <p class="fat">Max Mustermann → TWF4IE11c3Rlcm1hbm4=</p>
            </div>
            <div class="col gap-1">
                <h4>Kodierungsablauf</h4>
                <ol class="indented">
                    <li>Originaltext binär kodieren (das kennt ihr ja schon aus dem ersten Rätsel)</li>
                    <li>Binärdaten in 6-Bit-Blöcke aufteilen (26 = 64, daher auch der Name)</li>
                    <li>Jedem 6-Bit-Block wird ein bestimmter Groß-/Kleinbuchstabe oder eine Zahl zugeordnet</li>
                    <li>Padding in Form von "=" anhängen, wenn nötig (hier selbst googlen, wenn Interesse besteht)</li>
                </ol>
            </div>
            <div class="col gap-1 elevated-box">
                <h4 class="color-magenta">Rätsel</h4>
                <p>
                    Jetzt wo du die Theorie verstanden hast, schnapp dir einen <a class="color-cyan" target="_blank" href="https://fusionauth.io/dev-tools/base64-encoder-decoder">BASE64-Decoder</a> deiner Wahl & entschlüssel
                    mit diesem die folgenden Koordinaten:
                </p>
                <code class="color-magenta">TjUxsDAxLjU4NycKRTAxM7A0My4zODQn</code>
            </div>
        </div>
    </div>
</div>