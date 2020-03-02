<?php
  interface InputFields {
    public function show();
    public function addStyle(array $styles);
  }

  class InputEmail implements InputFields {

    private $_html = "<input type='email'>";

    public function show() {
      echo "<br>".$this->_html."<br>";
    }

    // Указываем что можем принять лишь массив - array
    public function addStyle(array $styles) {
        foreach($styles as $key => $value) {
          // Создаем строку в которую устанавливаем название стиля $key
          // и значение $value
          $style .= $key.":".$value.";";
        }

        // Теперь просто создаем input сразу со стилями с атрибутом style
        $this->_html = "<input type='email' style='".$style."'>";
    }
  }

  class InputFile implements InputFields {

    private $_html = "<input type='file'>";

    public function show() {
      echo "<br>".$this->_html."<br>";
    }

    // Указываем что можем принять лишь массив - array
    public function addStyle(array $styles) {
        foreach($styles as $key => $value) {
          // Создаем строку в которую устанавливаем название стиля $key
          // и значение $value
          $style .= $key.":".$value.";";
        }

        // Теперь просто создаем input сразу со стилями с атрибутом style
        $this->_html = "<input type='file' style='".$style."'>";
    }
  }

  class InputText implements InputFields {

    private $_html = "<input type='text'>";

    public function show() {
      echo "<br>".$this->_html."<br>";
    }

    // Указываем что можем принять лишь массив - array
    public function addStyle(array $styles) {
        foreach($styles as $key => $value) {
          // Создаем строку в которую устанавливаем название стиля $key
          // и значение $value
          $style .= $key.":".$value.";";
        }

        // Теперь просто создаем input сразу со стилями с атрибутом style
        $this->_html = "<input type='text' style='".$style."'>";
    }
  }
?>
