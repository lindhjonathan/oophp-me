---
---
Redovisning
=========================

Detta innehåll är skrivet i markdown och du hittar innehållet i filen `content/redovisning.md`.



Kmom01
-------------------------

Hur känns det att hoppa rakt in i objekt och klasser med PHP, gick det bra och kan du relatera till andra objektorienterade språk?

Det känns helt ok. Grunderna skiljer sig inte så mycket från t.ex. python som vi skrivit
lite objektorienterad kod i. Att skicka variabler till en klass-construktor var inte främmande, inte heller var det speciellt svårt att interagera med objekten genom
dess metoder. Det lilla vi fick se av arv i sitt egna exception i både övningen och i
guess-uppgiften var inget främmande heller. Visst såg man inget faktiskt arv där man sub-klassen ärvde några medlemsvariabler eller metoder, men det lär vi se i framtida kursmoment.

Berätta hur det gick det att utföra uppgiften “Gissa numret” med GET, POST och SESSION?

Det gick mestadels bra. GET och POST var en behövlig uppfräschning av minnet, sen när det
kom till sessionen hade jag lite problem. Till en början försökte jag lägga hela game-objektet i sessionen, men det blev problem med 'tries left', jag hittade helt enkelt inte rätt ställe att checka ifall spelet var slut eller inte, den vägrade även återställa när man uppdaterade sidan. Satt en stund och lekte med session destroy och återskapning, men valde till slut att ha ett game-objekt för sig själv, sen uppdatera dess värden via värdena lagrade i sessionen, mycket smidigare.

Har du några inledande reflektioner kring me-sidan och dess struktur?

Lite stökigt. Först med navbar och vart man skulle gå in och ändra för att lägga till sina egna css-filer. Mestadels hade det att göra med navigation i filsystemet för när det kom till att ändra och uppdatera sidorna så var det inga problem.

Vilken är din TIL för detta kmom?
I detta kursmoment har jag lärt mig hur objekt fungerar i php. Inte fullskaligt men en liten bit på vägen.

Kmom02
-------------------------

Hur gick det att överföra spelet “Gissa mitt nummer” in i din me-sida?

Det gick bra. Jag känner mig fortfarande lite vilsen i mappträdet, men förståelsen för
var alla saker har sin plats går stadigt uppåt. Mikaels video om att integrera nummer med
GET var en bra guide. POST var inte mycket skillnad. Att föra över session-versionen var inte
heller så svårt, det gällde bara att nollställa alla SESSION-variabler och återskapa med nya värden. Jag är inte helt hundra på att min kod är optimerad, den kan säkert bli mer effektiv. Men den fungerar och ser helt ok ut.

Berätta om din syn på modellering likt UML jämfört med verktyg som phpDocumentor. Fördelar, nackdelar, användningsområde? Vad tycker du om konceptet make doc?

UML ger en snabbare överblick över systemet upp till en viss storleksgrad. Navigationsmöjligheten i phpdoc ger en klar fördel när man arbetar med flertalet klasser i flertalet namespaces. Konceptet är bra, snabbt och smidigt att generera ett dokument, givet all kod bakom. Jag är inte säker på att jag skulle kunna slänga ihop något sådant på egen hand om man jämför med en UML-tabell som man kan skapa oavsett storlek på kodbasen.

Hur känns det att skriva kod utanför och inuti ramverket, ser du fördelar och nackdelar med de olika sätten?

Fördelarna med att skriva kod inuti ramverket är ju att man kan återanvända stora mängder kod. Nackdelen är ju att om man ska testa flera små saker så behöver man oftast uppdatera information/kod i flera olika filer och det kan bli rörigt om man ska skriva om vissa kodsnuttar hela tiden. Jag kanske kommer känna annorlunda när jag är mer insatt i ramverket, men just nu känns det som sagt fortfarande lite främmande att navigera bland alla mappar och filer.

Vilken är din TIL för detta kmom?

TIL mer om ramverk och hur namespaces fungerar i PHP.


Kmom03
-------------------------

Här är redovisningstexten



Kmom04
-------------------------

Här är redovisningstexten



Kmom05
-------------------------

Här är redovisningstexten



Kmom06
-------------------------

Här är redovisningstexten



Kmom07-10
-------------------------

Här är redovisningstexten
