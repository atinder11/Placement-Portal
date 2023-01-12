export default class BulmaNotification{
  constructor(){
    // Create DOM notification structure when instantiated
    this.init();
  }

  init(){
    this.hideTimeout = null;

    // Creating the notification container div
    this.containerNode = document.createElement("div");
    this.containerNode.className = "notification note";

    // Adding the notification title node
    this.titleNode = document.createElement('p');
    this.titleNode.className = "note-title";
    
    // Adding the notification message content node
    this.messageNode = document.createElement('p');
    this.messageNode.className = "note-content";
    
    // Adding a little button on the notification
    this.closeButtonNode = document.createElement('button');
    this.closeButtonNode.className = "delete";
    this.closeButtonNode.addEventListener('click', () => {
      this.close();
    });
    
    // Appending the container with all the elements newly created
    this.containerNode.appendChild(this.closeButtonNode);
    this.containerNode.appendChild(this.titleNode);
    this.containerNode.appendChild(this.messageNode);

    // Inserting the notification to the page body
    document.body.appendChild(this.containerNode);
  }

  // Make the notification visible on the screen
  show(title, message, context, duration){
    clearTimeout(this.hideTimeout);
      this.containerNode.classList.add("note-visible");

      // Setting a title to the notification
      if(title!=undefined)
        this.titleNode.textContent = title;
      else
        this.titleNode.textContent = "Notification Title"

      // Setting a message to the notification
      if(message!=undefined)
        this.messageNode.textContent = message;

      // Applying Bulma notification style/theme
      if (context) {
        this.containerNode.classList.add(`is-${context}`);
      }else{
        this.containerNode.classList.add('is-info');
      }

      // Default duration delay
      if(duration == undefined)
        duration=1500;
      else if(duration<=0 && duration !=-1){
        console.error('Bulma-notifications : the duration parameter value is not valid.'+"\n"+
        'Make sure this value is strictly greater than 0.');
      }else if(duration!=-1){
        // Waiting a given amout of time  
        this.hideTimeout = setTimeout(() => {
          this.close();
        }, duration);
      }
  }

  // Hide notification
  close(){
    this.containerNode.classList.remove("note-visible");
  }
}
