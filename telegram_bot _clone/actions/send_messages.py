
def send_messages_using_chatids(bot,ids,msg):
    for id in ids:
        bot.send_message(id,text=msg)