/**
 * @file
 * Customization of messages.
 */

((Backdrop) => {
  /**
   * Adds a close button to the message.
   *
   * @param {object} message
   *   The message object.
   */
  const closeMessage = (message) => {
    const messageContainer = message.querySelector(
      '[data-backdrop-selector="messages-container"]',
    );

    const closeBtnWrapper = document.createElement('div');
    closeBtnWrapper.setAttribute('class', 'messages__button');

    const closeBtn = document.createElement('button');
    closeBtn.setAttribute('type', 'button');
    closeBtn.setAttribute('class', 'messages__close');

    const closeBtnText = document.createElement('span');
    closeBtnText.setAttribute('class', 'element-invisible');
    closeBtnText.innerText = Backdrop.t('Close message');

    messageContainer.appendChild(closeBtnWrapper);
    closeBtnWrapper.appendChild(closeBtn);
    closeBtn.appendChild(closeBtnText);

    closeBtn.addEventListener('click', () => {
      message.classList.add('hidden');
      // If all messages are hidden, hide the whole message div.
      const allMessages = document.querySelectorAll( ' [data-backdrop-selector="messages"]');
      const hiddenMessages = document.querySelectorAll( ' [data-backdrop-selector="messages"][class~="hidden"]');
      if (hiddenMessages.length == allMessages.length) {
        document.querySelector('.l-messages').setAttribute('class', 'element-invisible');
      }
    });
  };

  /**
   * Get messages from context.
   *
   * @type {Backdrop~behavior}
   *
   * @prop {Backdrop~behaviorAttach} attach
   *   Attaches the close button behavior for messages.
   */
  Backdrop.behaviors.messages = {
    attach(context) {
      const allMessages = document.querySelectorAll( ' [data-backdrop-selector="messages"]');

      allMessages.forEach(
        closeMessage,
      );
    },
  };

})(Backdrop);
