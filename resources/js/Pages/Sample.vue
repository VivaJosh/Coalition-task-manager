<template>
    <Head title="Synfusion Sample" />

    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class="text-xl font-medium"> Table </h2>

            <div class="mt-8 bg-white dark:bg-gray-800 w-full shadow sm:rounded-lg">
                <ejs-grid :dataSource='data' :allowFiltering='true'  :allowSorting='true'  :toolbar='toolbarOptions' height='600px'>
                    <e-columns>
                        <e-column field='OrderID' headerText='Order ID' textAlign='Right' width=100></e-column>
                        <e-column field='CustomerID' headerText='Customer ID' width=120></e-column>
                        <e-column field='ShipCity' headerText='Ship City' width=100></e-column>
                        <e-column field='ShipName' headerText='Ship Name' width=100></e-column>
                    </e-columns>
                </ejs-grid>
            </div>
        </div>
    </div>
</template>


<script>
import { defineComponent } from 'vue'
import { Head, Link } from '@inertiajs/inertia-vue3';
import { GridComponent, ColumnDirective, ColumnsDirective, Toolbar, Search, Sort, Page, Filter } from "@syncfusion/ej2-vue-grids";
export default defineComponent({
    components: {
        Head,
        Link,
        "ejs-grid": GridComponent,
        "e-columns": ColumnsDirective,
        "e-column": ColumnDirective,
    },

    props: {
        canLogin: Boolean,
        canRegister: Boolean,
        laravelVersion: String,
        phpVersion: String,
    },

    data() {
        return {
            target: "#target",
            height: "100%",
            width: "100%",
            toolbarOptions: ['Search'],
            pageSettings: { pageSize: 8 },
            data:  [
                {
                    "OrderID":10248,
                    "CustomerID":"VINET",
                    "OrderDate":"1996-07-04T00:00:00.000Z",
                    "ShippedDate":"1996-07-16T00:00:00.000Z",
                    "Freight":32.38,
                    "ShipName":"Vins et alcools Chevalier",
                    "ShipAddress":"59 rue de l'Abbaye",
                    "ShipCity":"Reims",
                    "ShipRegion":null,
                    "ShipCountry":"France",
                    "Verified": true
                },
                {
                    "OrderID":10249,
                    "CustomerID":"TOMSP",
                    "OrderDate":"1996-07-05T00:00:00.000Z",
                    "ShippedDate":"1996-07-10T00:00:00.000Z",
                    "Freight":11.61,
                    "ShipName":"Toms Spezialitäten",
                    "ShipAddress":"Luisenstr. 48",
                    "ShipCity":"Münster",
                    "ShipRegion":null,
                    "ShipCountry":"Germany"
                },
                {
                    "OrderID":10250,
                    "CustomerID":"HANAR",
                    "OrderDate":"1996-07-08T00:00:00.000Z",
                    "ShippedDate":"1996-07-12T00:00:00.000Z",
                    "Freight":65.83,
                    "ShipName":"Hanari Carnes",
                    "ShipAddress":"Rua do Paço, 67",
                    "ShipCity":"Rio de Janeiro",
                    "ShipRegion":"RJ",
                    "ShipCountry":"Brazil",
                    "Verified": true
                },
                {
                    "OrderID":10251,
                    "CustomerID":"VICTE",
                    "OrderDate":"1996-07-08T00:00:00.000Z",
                    "ShippedDate":"1996-07-15T00:00:00.000Z",
                    "Freight":41.34,
                    "ShipName":"Victuailles en stock",
                    "ShipAddress":"2, rue du Commerce",
                    "ShipCity":"Lyon",
                    "ShipRegion":null,
                    "ShipCountry":"France",
                    "Verified": true
                },
                {
                    "OrderID":10252,
                    "CustomerID":"SUPRD",
                    "OrderDate":"1996-07-09T00:00:00.000Z",
                    "ShippedDate":"1996-07-11T00:00:00.000Z",
                    "Freight":51.3,
                    "ShipName":"Suprêmes délices",
                    "ShipAddress":"Boulevard Tirou, 255",
                    "ShipCity":"Charleroi",
                    "ShipRegion":null,
                    "ShipCountry":"Belgium"
                },
                {
                    "OrderID":10253,
                    "CustomerID":"HANAR",
                    "OrderDate":"1996-07-10T00:00:00.000Z",
                    "ShippedDate":"1996-07-16T00:00:00.000Z",
                    "Freight":58.17,
                    "ShipName":"Hanari Carnes",
                    "ShipAddress":"Rua do Paço, 67",
                    "ShipCity":"Rio de Janeiro",
                    "ShipRegion":"RJ",
                    "ShipCountry":"Brazil",
                    "Verified": true
                },
                {
                    "OrderID":10254,
                    "CustomerID":"CHOPS",
                    "OrderDate":"1996-07-11T00:00:00.000Z",
                    "ShippedDate":"1996-07-23T00:00:00.000Z",
                    "Freight":22.98,
                    "ShipName":"Chop-suey Chinese",
                    "ShipAddress":"Hauptstr. 31",
                    "ShipCity":"Bern",
                    "ShipRegion":null,
                    "ShipCountry":"Switzerland",
                    "Verified": true
                },
                {
                    "OrderID":10255,
                    "CustomerID":"RICSU",
                    "OrderDate":"1996-07-12T00:00:00.000Z",
                    "ShippedDate":"1996-07-15T00:00:00.000Z",
                    "Freight":148.33,
                    "ShipName":"Richter Supermarkt",
                    "ShipAddress":"Starenweg 5",
                    "ShipCity":"Genève",
                    "ShipRegion":null,
                    "ShipCountry":"Switzerland"
                },
                {
                    "OrderID":10256,
                    "CustomerID":"WELLI",
                    "OrderDate":"1996-07-15T00:00:00.000Z",
                    "ShippedDate":"1996-07-17T00:00:00.000Z",
                    "Freight":13.97,
                    "ShipName":"Wellington Importadora",
                    "ShipAddress":"Rua do Mercado, 12",
                    "ShipCity":"Resende",
                    "ShipRegion":"SP",
                    "ShipCountry":"Brazil"
                },
                {
                    "OrderID":10257,
                    "CustomerID":"HILAA",
                    "OrderDate":"1996-07-16T00:00:00.000Z",
                    "ShippedDate":"1996-07-22T00:00:00.000Z",
                    "Freight":81.91,
                    "ShipName":"HILARION-Abastos",
                    "ShipAddress":"Carrera 22 con Ave. Carlos Soublette #8-35",
                    "ShipCity":"San Cristóbal",
                    "ShipRegion":"Táchira",
                    "ShipCountry":"Venezuela"
                },
                {
                    "OrderID":10258,
                    "CustomerID":"ERNSH",
                    "OrderDate":"1996-07-17T00:00:00.000Z",
                    "ShippedDate":"1996-07-23T00:00:00.000Z",
                    "Freight":140.51,
                    "ShipName":"Ernst Handel",
                    "ShipAddress":"Kirchgasse 6",
                    "ShipCity":"Graz",
                    "ShipRegion":null,
                    "ShipCountry":"Austria"
                },
                {
                    "OrderID":10259,
                    "CustomerID":"CENTC",
                    "OrderDate":"1996-07-18T00:00:00.000Z",
                    "ShippedDate":"1996-07-25T00:00:00.000Z",
                    "Freight":3.25,
                    "ShipName":"Centro comercial Moctezuma",
                    "ShipAddress":"Sierras de Granada 9993",
                    "ShipCity":"México D.F.",
                    "ShipRegion":null,
                    "ShipCountry":"Mexico",
                    "Verified": true
                },
                {
                    "OrderID":10260,
                    "CustomerID":"OTTIK",
                    "OrderDate":"1996-07-19T00:00:00.000Z",
                    "ShippedDate":"1996-07-29T00:00:00.000Z",
                    "Freight":55.09,
                    "ShipName":"Ottilies Käseladen",
                    "ShipAddress":"Mehrheimerstr. 369",
                    "ShipCity":"Köln",
                    "ShipRegion":null,
                    "ShipCountry":"Germany",
                    "Verified": true
                },
                {
                    "OrderID":10261,
                    "CustomerID":"QUEDE",
                    "OrderDate":"1996-07-19T00:00:00.000Z",
                    "ShippedDate":"1996-07-30T00:00:00.000Z",
                    "Freight":3.05,
                    "ShipName":"Que Delícia",
                    "ShipAddress":"Rua da Panificadora, 12",
                    "ShipCity":"Rio de Janeiro",
                    "ShipRegion":"RJ",
                    "ShipCountry":"Brazil"
                },
                {
                    "OrderID":10262,
                    "CustomerID":"RATTC",
                    "OrderDate":"1996-07-22T00:00:00.000Z",
                    "ShippedDate":"1996-07-25T00:00:00.000Z",
                    "Freight":48.29,
                    "ShipName":"Rattlesnake Canyon Grocery",
                    "ShipAddress":"2817 Milton Dr.",
                    "ShipCity":"Albuquerque",
                    "ShipRegion":"NM",
                    "ShipCountry":"USA",
                    "Verified": true
                },
                {
                    "OrderID":10263,
                    "CustomerID":"ERNSH",
                    "OrderDate":"1996-07-23T00:00:00.000Z",
                    "ShippedDate":"1996-07-31T00:00:00.000Z",
                    "Freight":146.06,
                    "ShipName":"Ernst Handel",
                    "ShipAddress":"Kirchgasse 6",
                    "ShipCity":"Graz",
                    "ShipRegion":null,
                    "Verified": true,
                    "ShipCountry":"Austria"
                },
                {
                    "OrderID":10264,
                    "CustomerID":"FOLKO",
                    "OrderDate":"1996-07-24T00:00:00.000Z",
                    "ShippedDate":"1996-08-23T00:00:00.000Z",
                    "Freight":3.67,
                    "ShipName":"Folk och fä HB",
                    "ShipAddress":"Åkergatan 24",
                    "ShipCity":"Bräcke",
                    "ShipRegion":null,
                    "ShipCountry":"Sweden"
                },
                {
                    "OrderID":10265,
                    "CustomerID":"BLONP",
                    "OrderDate":"1996-07-25T00:00:00.000Z",
                    "ShippedDate":"1996-08-12T00:00:00.000Z",
                    "Freight":55.28,
                    "ShipName":"Blondel père et fils",
                    "ShipAddress":"24, place Kléber",
                    "ShipCity":"Strasbourg",
                    "ShipRegion":null,
                    "ShipCountry":"France"
                },
                {
                    "OrderID":10266,
                    "CustomerID":"WARTH",
                    "OrderDate":"1996-07-26T00:00:00.000Z",
                    "ShippedDate":"1996-07-31T00:00:00.000Z",
                    "Freight":25.73,
                    "ShipName":"Wartian Herkku",
                    "ShipAddress":"Torikatu 38",
                    "ShipCity":"Oulu",
                    "ShipRegion":null,
                    "ShipCountry":"Finland"
                },
                {
                    "OrderID":10267,
                    "CustomerID":"FRANK",
                    "OrderDate":"1996-07-29T00:00:00.000Z",
                    "ShippedDate":"1996-08-06T00:00:00.000Z",
                    "Freight":208.58,
                    "ShipName":"Frankenversand",
                    "ShipAddress":"Berliner Platz 43",
                    "ShipCity":"München",
                    "ShipRegion":null,
                    "ShipCountry":"Germany",
                    "Verified": true
                },
                {
                    "OrderID":10268,
                    "CustomerID":"GROSR",
                    "OrderDate":"1996-07-30T00:00:00.000Z",
                    "ShippedDate":"1996-08-02T00:00:00.000Z",
                    "Freight":66.29,
                    "ShipName":"GROSELLA-Restaurante",
                    "ShipAddress":"5ª Ave. Los Palos Grandes",
                    "ShipCity":"Caracas",
                    "ShipRegion":"DF",
                    "ShipCountry":"Venezuela"
                },
                {
                    "OrderID":10269,
                    "CustomerID":"WHITC",
                    "OrderDate":"1996-07-31T00:00:00.000Z",
                    "ShippedDate":"1996-08-09T00:00:00.000Z",
                    "Freight":4.56,
                    "ShipName":"White Clover Markets",
                    "ShipAddress":"1029 - 12th Ave. S.",
                    "ShipCity":"Seattle",
                    "ShipRegion":"WA",
                    "ShipCountry":"USA"
                },
                {
                    "OrderID":10270,
                    "CustomerID":"WARTH",
                    "OrderDate":"1996-08-01T00:00:00.000Z",
                    "ShippedDate":"1996-08-02T00:00:00.000Z",
                    "Freight":136.54,
                    "ShipName":"Wartian Herkku",
                    "ShipAddress":"Torikatu 38",
                    "ShipCity":"Oulu",
                    "ShipRegion":null,
                    "ShipCountry":"Finland"
                },
                {
                    "OrderID":10271,
                    "CustomerID":"SPLIR",
                    "OrderDate":"1996-08-01T00:00:00.000Z",
                    "ShippedDate":"1996-08-30T00:00:00.000Z",
                    "Freight":4.54,
                    "ShipName":"Split Rail Beer & Ale",
                    "ShipAddress":"P.O. Box 555",
                    "ShipCity":"Lander",
                    "ShipRegion":"WY",
                    "ShipCountry":"USA"
                },
                {
                    "OrderID":10272,
                    "CustomerID":"RATTC",
                    "OrderDate":"1996-08-02T00:00:00.000Z",
                    "ShippedDate":"1996-08-06T00:00:00.000Z",
                    "Freight":98.03,
                    "ShipName":"Rattlesnake Canyon Grocery",
                    "ShipAddress":"2817 Milton Dr.",
                    "ShipCity":"Albuquerque",
                    "ShipRegion":"NM",
                    "ShipCountry":"USA"
                },
                {
                    "OrderID":10273,
                    "CustomerID":"QUICK",
                    "OrderDate":"1996-08-05T00:00:00.000Z",
                    "ShippedDate":"1996-08-12T00:00:00.000Z",
                    "Freight":76.07,
                    "ShipName":"QUICK-Stop",
                    "ShipAddress":"Taucherstraße 10",
                    "ShipCity":"Cunewalde",
                    "ShipRegion":null,
                    "ShipCountry":"Germany"
                },
                {
                    "OrderID":10274,
                    "CustomerID":"VINET",
                    "OrderDate":"1996-08-06T00:00:00.000Z",
                    "ShippedDate":"1996-08-16T00:00:00.000Z",
                    "Freight":6.01,
                    "ShipName":"Vins et alcools Chevalier",
                    "ShipAddress":"59 rue de l'Abbaye",
                    "ShipCity":"Reims",
                    "ShipRegion":null,
                    "ShipCountry":"France"
                },
                {
                    "OrderID":10275,
                    "CustomerID":"MAGAA",
                    "OrderDate":"1996-08-07T00:00:00.000Z",
                    "ShippedDate":"1996-08-09T00:00:00.000Z",
                    "Freight":26.93,
                    "ShipName":"Magazzini Alimentari Riuniti",
                    "ShipAddress":"Via Ludovico il Moro 22",
                    "ShipCity":"Bergamo",
                    "ShipRegion":null,
                    "ShipCountry":"Italy"
                },
                {
                    "OrderID":10276,
                    "CustomerID":"TORTU",
                    "OrderDate":"1996-08-08T00:00:00.000Z",
                    "ShippedDate":"1996-08-14T00:00:00.000Z",
                    "Freight":13.84,
                    "ShipName":"Tortuga Restaurante",
                    "ShipAddress":"Avda. Azteca 123",
                    "ShipCity":"México D.F.",
                    "ShipRegion":null,
                    "ShipCountry":"Mexico"
                },
                {
                    "OrderID":10277,
                    "CustomerID":"MORGK",
                    "OrderDate":"1996-08-09T00:00:00.000Z",
                    "ShippedDate":"1996-08-13T00:00:00.000Z",
                    "Freight":125.77,
                    "ShipName":"Morgenstern Gesundkost",
                    "ShipAddress":"Heerstr. 22",
                    "ShipCity":"Leipzig",
                    "ShipRegion":null,
                    "ShipCountry":"Germany",
                    "Verified": true
                },
                {
                    "OrderID":10278,
                    "CustomerID":"BERGS",
                    "OrderDate":"1996-08-12T00:00:00.000Z",
                    "ShippedDate":"1996-08-16T00:00:00.000Z",
                    "Freight":92.69,
                    "ShipName":"Berglunds snabbköp",
                    "ShipAddress":"Berguvsvägen  8",
                    "ShipCity":"Luleå",
                    "ShipRegion":null,
                    "ShipCountry":"Sweden"
                },
                {
                    "OrderID":10279,
                    "CustomerID":"LEHMS",
                    "OrderDate":"1996-08-13T00:00:00.000Z",
                    "ShippedDate":"1996-08-16T00:00:00.000Z",
                    "Freight":25.83,
                    "ShipName":"Lehmanns Marktstand",
                    "ShipAddress":"Magazinweg 7",
                    "ShipCity":"Frankfurt a.M.",
                    "ShipRegion":null,
                    "ShipCountry":"Germany"
                },
                {
                    "OrderID":10280,
                    "CustomerID":"BERGS",
                    "OrderDate":"1996-08-14T00:00:00.000Z",
                    "ShippedDate":"1996-09-12T00:00:00.000Z",
                    "Freight":8.98,
                    "ShipName":"Berglunds snabbköp",
                    "ShipAddress":"Berguvsvägen  8",
                    "ShipCity":"Luleå",
                    "ShipRegion":null,
                    "ShipCountry":"Sweden",
                    "Verified": true
                },
                {
                    "OrderID":10281,
                    "CustomerID":"ROMEY",
                    "OrderDate":"1996-08-14T00:00:00.000Z",
                    "ShippedDate":"1996-08-21T00:00:00.000Z",
                    "Freight":2.94,
                    "ShipName":"Romero y tomillo",
                    "ShipAddress":"Gran Vía, 1",
                    "ShipCity":"Madrid",
                    "ShipRegion":null,
                    "ShipCountry":"Spain"
                },
                {
                    "OrderID":10282,
                    "CustomerID":"ROMEY",
                    "OrderDate":"1996-08-15T00:00:00.000Z",
                    "ShippedDate":"1996-08-21T00:00:00.000Z",
                    "Freight":12.69,
                    "ShipName":"Romero y tomillo",
                    "ShipAddress":"Gran Vía, 1",
                    "ShipCity":"Madrid",
                    "ShipRegion":null,
                    "ShipCountry":"Spain"
                },
                {
                    "OrderID":10283,
                    "CustomerID":"LILAS",
                    "OrderDate":"1996-08-16T00:00:00.000Z",
                    "ShippedDate":"1996-08-23T00:00:00.000Z",
                    "Freight":84.81,
                    "ShipName":"LILA-Supermercado",
                    "ShipAddress":"Carrera 52 con Ave. Bolívar #65-98 Llano Largo",
                    "ShipCity":"Barquisimeto",
                    "ShipRegion":"Lara",
                    "ShipCountry":"Venezuela"
                },
                {
                    "OrderID":10284,
                    "CustomerID":"LEHMS",
                    "OrderDate":"1996-08-19T00:00:00.000Z",
                    "ShippedDate":"1996-08-27T00:00:00.000Z",
                    "Freight":76.56,
                    "ShipName":"Lehmanns Marktstand",
                    "ShipAddress":"Magazinweg 7",
                    "ShipCity":"Frankfurt a.M.",
                    "ShipRegion":null,
                    "ShipCountry":"Germany",
                    "Verified": true
                },
                {
                    "OrderID":10285,
                    "CustomerID":"QUICK",
                    "OrderDate":"1996-08-20T00:00:00.000Z",
                    "ShippedDate":"1996-08-26T00:00:00.000Z",
                    "Freight":76.83,
                    "ShipName":"QUICK-Stop",
                    "ShipAddress":"Taucherstraße 10",
                    "ShipCity":"Cunewalde",
                    "ShipRegion":null,
                    "ShipCountry":"Germany"
                },
                {
                    "OrderID":10286,
                    "CustomerID":"QUICK",
                    "OrderDate":"1996-08-21T00:00:00.000Z",
                    "ShippedDate":"1996-08-30T00:00:00.000Z",
                    "Freight":229.24,
                    "ShipName":"QUICK-Stop",
                    "ShipAddress":"Taucherstraße 10",
                    "ShipCity":"Cunewalde",
                    "ShipRegion":null,
                    "ShipCountry":"Germany"
                },
                {
                    "OrderID":10287,
                    "CustomerID":"RICAR",
                    "OrderDate":"1996-08-22T00:00:00.000Z",
                    "ShippedDate":"1996-08-28T00:00:00.000Z",
                    "Freight":12.76,
                    "ShipName":"Ricardo Adocicados",
                    "ShipAddress":"Av. Copacabana, 267",
                    "ShipCity":"Rio de Janeiro",
                    "ShipRegion":"RJ",
                    "ShipCountry":"Brazil"
                },
                {
                    "OrderID":10288,
                    "CustomerID":"REGGC",
                    "OrderDate":"1996-08-23T00:00:00.000Z",
                    "ShippedDate":"1996-09-03T00:00:00.000Z",
                    "Freight":7.45,
                    "ShipName":"Reggiani Caseifici",
                    "ShipAddress":"Strada Provinciale 124",
                    "ShipCity":"Reggio Emilia",
                    "ShipRegion":null,
                    "ShipCountry":"Italy"
                },
                {
                    "OrderID":10289,
                    "CustomerID":"BSBEV",
                    "OrderDate":"1996-08-26T00:00:00.000Z",
                    "ShippedDate":"1996-08-28T00:00:00.000Z",
                    "Freight":22.77,
                    "ShipName":"B's Beverages",
                    "ShipAddress":"Fauntleroy Circus",
                    "ShipCity":"London",
                    "ShipRegion":null,
                    "ShipCountry":"UK"
                },
                {
                    "OrderID":10290,
                    "CustomerID":"COMMI",
                    "OrderDate":"1996-08-27T00:00:00.000Z",
                    "ShippedDate":"1996-09-03T00:00:00.000Z",
                    "Freight":79.7,
                    "ShipName":"Comércio Mineiro",
                    "ShipAddress":"Av. dos Lusíadas, 23",
                    "ShipCity":"Sao Paulo",
                    "ShipRegion":"SP",
                    "ShipCountry":"Brazil"
                },
                {
                    "OrderID":10291,
                    "CustomerID":"QUEDE",
                    "OrderDate":"1996-08-27T00:00:00.000Z",
                    "ShippedDate":"1996-09-04T00:00:00.000Z",
                    "Freight":6.4,
                    "ShipName":"Que Delícia",
                    "ShipAddress":"Rua da Panificadora, 12",
                    "ShipCity":"Rio de Janeiro",
                    "ShipRegion":"RJ",
                    "ShipCountry":"Brazil"
                },
                {
                    "OrderID":10292,
                    "CustomerID":"TRADH",
                    "OrderDate":"1996-08-28T00:00:00.000Z",
                    "ShippedDate":"1996-09-02T00:00:00.000Z",
                    "Freight":1.35,
                    "ShipName":"Tradiçao Hipermercados",
                    "ShipAddress":"Av. Inês de Castro, 414",
                    "ShipCity":"Sao Paulo",
                    "ShipRegion":"SP",
                    "ShipCountry":"Brazil"
                },
                {
                    "OrderID":10293,
                    "CustomerID":"TORTU",
                    "OrderDate":"1996-08-29T00:00:00.000Z",
                    "ShippedDate":"1996-09-11T00:00:00.000Z",
                    "Freight":21.18,
                    "ShipName":"Tortuga Restaurante",
                    "ShipAddress":"Avda. Azteca 123",
                    "ShipCity":"México D.F.",
                    "ShipRegion":null,
                    "ShipCountry":"Mexico"
                },
                {
                    "OrderID":10294,
                    "CustomerID":"RATTC",
                    "OrderDate":"1996-08-30T00:00:00.000Z",
                    "ShippedDate":"1996-09-05T00:00:00.000Z",
                    "Freight":147.26,
                    "ShipName":"Rattlesnake Canyon Grocery",
                    "ShipAddress":"2817 Milton Dr.",
                    "ShipCity":"Albuquerque",
                    "ShipRegion":"NM",
                    "ShipCountry":"USA"
                }]
        }
    },

    provide: {
        grid: [Toolbar, Search, Sort, Filter]
    }
})
</script>
