# Laravel 11 透過虛擬亂數產生器隨機化指令任務排程間隔

引入 skywarth 的 chaotic-schedule 套件來擴增透過虛擬亂數產生器隨機化指令任務排程間隔，虛擬亂數產生器是一種演算法，能夠根據稱為「種子」的起始值產生可預測的數序，產生的數序具有與真正隨機數序大致相同的屬性，但設定速度更快，設定時的運算成本也較低。

## 使用方式
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 啟動排程器，僅需要在伺服器上增加一條 Cron 項目即可。
```sh
* * * * * cd /{專案路徑} && php artisan schedule:run >> /dev/null 2>&1
```

----

## 畫面截圖
![](https://i.imgur.com/yHWXTnL.png)
> 能夠模擬真正的隨機數序
