# Corona Info Update

## Information
Sebuah tool yang dibuat untuk mendapatkan data persebaran covid terbaru di Jawa Timur 
```
https://covid19dev.jatimprov.go.id/xweb/draxi
```

## Usage

include ``` src/covid.php ``` ke dalam project-mu . Kemudian deklarasikan kedalam sebuah variable
eg:
```
$covid = new Covid19;

$covid->getData();
```

## Function

| Name        | Params           | Desc  |
| ------------- |-------------| -----|
| getData      | null | return all data |
| getZone      | string / array      |   return all data from specific zone |
| getTotalODP | null      |    return total ODP case |
| getTotalPDP | null      |    return total PDP case |
| getTotalConfirm | null      |    return total confirm positif case |


## Contribute

Bagi kalian yang ingin berkontribusi silahkan lakukan pull request
