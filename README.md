viewExcel2Table
===============

[doorKeeper](http://www.doorkeeper.jp/) の参加者一覧のExcelをWebで一覧で表示するためのPHP
Libraryとして[PHPExcel 1.8.0](https://phpexcel.codeplex.com/)をバグフィクスして使っている。


# config.iniの説明
* excel_folder_path
Excelファイルの配置場所

* title
表示されるタイトル

* view_column_number_list
表示するExcelの列
指定した順に表示する

#doorKeeperの参加者一覧をダウンロードする場合
[getDoorkeeperExcel](https://github.com/soudai/getDoorkeeperExcel) 