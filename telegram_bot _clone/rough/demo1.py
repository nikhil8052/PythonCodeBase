import json 
import requests 

query1='''{
  getStudentExamQuestions(
    mobile: "9701908767"
    exam_session_id: 0
    type: "schedule_exam"
    exam_paper_id:7117
  ) {
    id
    question
    option1
    option2
    option3
    option4
    bookmarked
    compquestion
    examType
    explanation
    qtype
    inputquestion
    list1type
    list2type
    mains_2021
    mat_question
    selection_type
    sub_exam_type
    subject
    subject_name
  }
}'''

query2='''{
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
data=json.loads(r.text)
# arr=data['data']['getQuizExams']
# print(arr)
print(data)

# data=json.loads(r.text)
# questionos=data['data']['getStudentExamQuestions']
# arr=[]
# for q in questionos:
#     tem_arr={}
#     opts=[]
#     tem_arr['question']=q['question']
#     opts.append(q['option1'])
#     opts.append(q['option2'])
#     opts.append(q['option3'])
#     opts.append(q['option4'])
#     tem_arr['options']=opts
#     arr.append(tem_arr)
# print(arr)




