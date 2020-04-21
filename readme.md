# Corona Info Update

## Information
Sebuah tool yang dibuat untuk mendapatkan data persebaran covid terbaru di Jawa Timur 
```
https://literasistmj.000webhostapp.com
```

## Usage

include ``` src/covid.php ``` ke dalam project-mu . Kemudian deklarasikan kedalam sebuah variable
eg:
```
$covid = new Covid19;

$covid->getAllData();
```

## Function

| Name        | Params           | Desc  |
| ------------- |-------------| -----|
| getAllZone      | null | return all data |
| getZone      | string / array      |   return all data from specific zone |
| get | null      |    return total case in indonesian |



## variable

| Name | Desc|
| ---------- | -------- |
| $totalPositif  | return  count  of positif case |
| $totalSembuh | return  count  of recovered case |
| $totalMeninggal | return  count  of death case |

## Contribute

Bagi kalian yang ingin berkontribusi silahkan lakukan pull request
