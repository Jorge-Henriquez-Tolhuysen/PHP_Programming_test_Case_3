PHP_Programming_test_Case_3

Para la clase CategoryTree implementar los metodos addCategory($categoria, $padre) y getChildren($categoria), en conjunto con los elementos auxiliares requeridos de tal forma que:

1) Al llamar a addCategory($categoria, null) se cree un elemento raiz.
2) Al llamar a addCategory($categoria, $padre) se agregue al elemento $padre, la categoria indicada.
3) Al getChildren($categoria) se genere un arreglo con lo elementos hijos de la categoria indicada.

Obj: Para el punto 3, solo considerar los hijos inmediatos, es decir, solo los hermanos que son hijos de la categoria solicitada.

Durante el desarrollo del test complete la estructura general de los metodos solicitados, no obstante me vi complicado por el hecho de no haber considerado que la funcion que buscaba la categoria donde agregar un hijo, devolvia una copia de esta y al insertar el hijo, no se afectaba al objeto CategoryTree. Esto lo corregi incluyendo el operador de referencia ( & ) en el parametro de entrada, y en la definicion de la funcion misma ....

Adicionalmente, cuando agregaba la categoria hija al padre indicado, no indicaba la categoria hija como indice del nuevo elemento del arreglo (lo dejaba vacio y asi asumia indice numero), sino como clave en un nuevo arreglo ....

Linea 15: Con error
           $foundCategory[] = [$category=>[]];
           
Linea 15: Sin error
           $foundCategory[$category] = [];

