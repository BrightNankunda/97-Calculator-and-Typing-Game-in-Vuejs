<template>
  <div>
    <div class="container col-md-10">
      <Header />
      <div class="content">
        <div class="calculator mt-2">
          <div class="bg-light display">{{ current }}</div>
          <div @click="clear" class="but">AC</div>
          <div @click="sign" class="but">+/-</div>
          <div @click="percent" class="but">%</div>
          <div @click="divide" class="but number operator">/</div>
          <div @click="append(7)" class="but">7</div>
          <div @click="append(8)" class="but">8</div>
          <div @click="append(9)" class="but">9</div>
          <div @click="times" class="but operator">*</div>
          <div @click="append(4)" class="but">4</div>
          <div @click="append(5)" class="but">5</div>
          <div @click="append(6)" class="but">6</div>
          <div @click="minus" class="but operator">-</div>
          <div @click="append(1)" class="but">1</div>
          <div @click="append(2)" class="but">2</div>
          <div @click="append(3)" class="but">3</div>
          <div @click="add" class="but operator">+</div>
          <div @click="append(0)" class="but span-two">0</div>
          <div @click="dot" class="but">.</div>

          <div @click="equal" class="but operator">=</div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Header from "./Header.vue";
export default {
  name: "header",
  components: {
    Header,
  },
  data() {
    return {
      previous: null,
      current: "0",
      operator: null,
      operatorClicked: false,
    };
  },
  methods: {
    clear() {
      this.current = "0";
      this.previous = " ";
    },
    sign() {
      this.current = this.current.charAt(0) === "-" ? this.current.slice(1) : `-${this.current}`;
    },
    percent() {
      this.current = `${parseFloat(this.current) / 100}`;
    },
    append(number) {
      console.log(number);
      if (this.operatorClicked) {
        this.current = "";
        this.operatorClicked = false;
      }
      //   if (this.current.charAt(0) === "0" && this.current.charAt(1) !== ".") {
      //     this.current = number;
      //     this.current.slice(1);
      //   }
      this.current = `${this.current}` + number;
    },
    dot() {
      if (this.current.indexOf(".") === -1) {
        this.append(".");
      } else {
        return;
      }
    },
    setPrevious() {
      this.previous = this.current;
      console.log(this.previous);
      this.operatorClicked = true;
    },
    divide() {
      this.operator = (a, b) => a / b;
      this.setPrevious();
    },
    times() {
      this.operator = (a, b) => a * b;
      this.setPrevious();
    },
    minus() {
      this.operator = (a, b) => a - b;
      this.setPrevious();
    },
    add() {
      this.operator = (a, b) => a + b;
      this.setPrevious();
    },
    equal() {
      this.current = `${this.operator(parseFloat(this.previous), parseFloat(this.current))}`;
    },
  },
};
</script>

<style scoped>
*,
*::before,
*::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
.content {
  display: flex;
  justify-content: center;
}
.calculator {
  width: 350px;
  display: grid;
  font-size: 40px;
  text-align: center;
  grid-template-columns: repeat(4, 1fr);
  grid-auto-rows: minmax(50px, auto);
  border: 1px solid #eee;
}
.display {
  grid-row: auto;
  min-height: 60px;
  word-wrap: break-word;
  word-break: break-all;

  grid-column: 1 / 5;
  border: 1px solid #999;
  border-top-right-radius: 5px;
  border-top-left-radius: 5px;
}
.span-two {
  grid-column: span 2;
}
.but {
  background: #eee;
  border: 1px solid #fff;
  cursor: pointer;
}
.but:hover {
  background: rgba(240, 240, 240, 0.6);
}
.operator {
  background: orange;
  color: white;
}
</style>
