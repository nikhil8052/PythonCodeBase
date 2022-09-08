from telegram import InlineKeyboardButton,InlineKeyboardMarkup
from global_functions import get_chat_id  
import requests
import json 


# fetch all the quizes names available to the user
def fetch_quiz_names(exam_id):
    available_quizes=[]
    query1='''{
  getQuizExams(mobile:"1111100001" exam_type:1){
    id
    exam_name
    exam_type
    start_time
    end_time
    is_completed
    exam_session_id
    total_marks
    marks_obtained
    status
  }
}'''
    url="http://rizee.in:4005/graphql"
    r = requests.post(url, json={'query': query1})
    # print(r.text)
    print(" Dta from the buutons of rhe quiz ")
    records=json.loads(r.text)
    print(records)
    arr=records['data']['getQuizExams']
    print(arr)
    for item in arr :
      exam=item['exam_name']
      exam_paper_id=item['id']
      available_quizes.append({'exam_name':exam,'exam_paper_id':exam_paper_id})
    return available_quizes

    


def send_quiz_buttons(update,context):
    bot=context.bot
    chat_id=get_chat_id(update,context)
    keyboard = []
    arr=fetch_quiz_names(1)
    print( ' this is the array from the data of graphql ... ')
    for result in arr :
      exam_name=result['exam_name']
      exam_paper_id=result['exam_paper_id']
      callback_send_data=json.dumps({'type':'quizbutton','exam_paper_id':exam_paper_id})
      keyboard.append([InlineKeyboardButton(exam_name, callback_data=callback_send_data)])

    reply_markup = InlineKeyboardMarkup(keyboard)
    text='''Please select your favourite Quiz 😀.'''
    bot.send_message(chat_id,text=text,reply_markup=reply_markup)


