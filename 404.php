<style>

@-webkit-keyframes dots {
  0% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  8.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  16.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px 39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px 39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px 39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  25% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  33.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 -39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 -39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 -39px -39px 0 7px;
  }

  41.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  50% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  58.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  66.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px -39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px -39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px -39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  75% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  83.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 39px 39px 0 7px;
  }

  91.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  100% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }
}

@-moz-keyframes dots {
  0% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  8.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  16.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px 39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px 39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px 39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  25% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  33.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 -39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 -39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 -39px -39px 0 7px;
  }

  41.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  50% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  58.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  66.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px -39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px -39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px -39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  75% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  83.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 39px 39px 0 7px;
  }

  91.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  100% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }
}

@-o-keyframes dots {
  0% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  8.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  16.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px 39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px 39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px 39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  25% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  33.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 -39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 -39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 -39px -39px 0 7px;
  }

  41.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  50% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  58.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  66.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px -39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px -39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px -39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  75% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  83.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 39px 39px 0 7px;
  }

  91.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  100% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }
}

@keyframes dots {
  0% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  8.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  16.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px 39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px 39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px 39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  25% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  33.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 -39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 -39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 -39px -39px 0 7px;
  }

  41.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  50% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  58.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 -39px 39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  66.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px -39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px -39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 -39px -39px 0 7px, #000 -39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  75% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px -39px 0 7px, #35AAD8 39px -39px 0 7px;
  }

  83.33% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C 39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 39px 39px 0 7px;
  }

  91.67% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px 39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }

  100% {
    -webkit-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    -moz-box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
    box-shadow: white 0 0 15px 0, #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  }
}

/* Styles for old versions of IE */
.dots {
  font-family: sans-serif;
  font-weight: 100;
}

/* :not(:required) hides this rule from IE9 and below */
.dots:not(:required) {
  overflow: hidden;
  position: relative;
  text-indent: -9999px;
  display: inline-block;
  width: 30px;
  height: 30px;
  background: transparent;
  -webkit-box-shadow: #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  -moz-box-shadow: #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  box-shadow: #E74D3C -39px -39px 0 7px, #FF9D50 39px -39px 0 7px, #000 39px 39px 0 7px, #35AAD8 -39px 39px 0 7px;
  -webkit-animation: dots 3.5s infinite linear alternate-reverse;
  -moz-animation: dots 3.5s infinite linear alternate-reverse;
  -ms-animation: dots 3.5s infinite linear alternate-reverse;
  -o-animation: dots 3.5s infinite linear alternate-reverse;
  animation: dots 3.5s infinite linear alternate-reverse;
  -webkit-transform-origin: 50% 50%;
  -moz-transform-origin: 50% 50%;
  -ms-transform-origin: 50% 50%;
  -o-transform-origin: 50% 50%;
  transform-origin: 50% 50%;
F}
.wraper404{
    margin-left: 200px;
    margin-top: -32px;
}
</style>
<?php
    // meta tag robots
    osc_add_hook('header','bender_nofollow_construct');
    bender_add_body_class('error not-found');
    osc_current_web_theme_path('header.php') ;
?>
<div class="flashmessage-404 404p">
    <div class="content error">
            <h1><?php _e('404 Eror. Page not found', 'modern') ; ?></h1>
            </div>
   
<div class="wraper404"><div class="dots">
</div>
</div>
<div class="bottom_image">
    <img src="http://playandbay.com/betaPlayandBay3/oc-content/themes/isha/images/404.png" width="100%" height="100%" alt="">
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>