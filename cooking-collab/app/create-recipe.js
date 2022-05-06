$(document).ready(function(){
    //DEMO RECIPE//

    function setRecipe(){
        let demoRecipe = {
            recipe_name: "3 Cheese Garlic Bread",
            servings:[1,2,4],
            recipe_prep: "30 minutes",
            recipe_difficulty: "Easy",
            ingredients:[
                    {
                        quantity: 1, 
                        item: "stick of butter softened"
                    },
                    {
                        quantity: 4,
                        item: "cloves garlic, minced"
                    },
                    {
                        quantity: 0.3,
                        item: "cup parmesan cheese"
                    },
                    {
                        quantity: 0.3,
                        item: "cup shredded monterey jack cheese"
                    },
                    {
                        quantity: 0.3,
                        item: "cup shredded cheddar cheese"
                    },
                    {
                        quantity: 0.3,
                        item: "cup fresh green onion, sliced"
                    },
                    {
                        quantity: 1,
                        item: "baguette, 8 inch (20 cm)"
                    }
                ],
            instructions:["Preheat oven to 400°F (200°C).", "In a bowl, combine all of the ingredients except the baguette, and mix until smooth.", "Slice the baguette in half lengthwise, then spread the butter mixture evenly on both sides of the baguette.", "Place on a tray lined with parchment paper and bake for about 15 minutes, until cheese is bubbly and starting to brown on the edges.", "Slice, cool, then serve."
            
                ],
        };
    
       let setRecipe = localStorage.setItem('demoRecipe', JSON.stringify(demoRecipe));

       return setRecipe; 

    }
    
    setRecipe();
    

    function loadRecipeData(){
     let getRecipe = JSON.parse(localStorage.getItem('demoRecipe'));
     
     document.querySelector(".recipeName").innerHTML = getRecipe.recipe_name; 
     document.querySelector(".recipeDifficulty").innerHTML = getRecipe.recipe_difficulty;
     document.querySelector(".recipePrepTime").innerHTML = getRecipe.recipe_prep;  
        
    }
  
    loadRecipeData();

    function displayRecipe(){

  
    }

    displayRecipe(); 



}); 

